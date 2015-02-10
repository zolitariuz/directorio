<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Gestor_contenidos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Esconde warnings
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		$this->load->helper(array('form', 'url'));
	} // constructor

	/**
	 * Descripción: Panel de administración de contenidos
	 * Input:		ninguno
	 */
	function panel_admin()
	{
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// datos usuario
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id);

		// Cargar vista login
		$this->load->view('cms/header', $data);
		$this->load->view('cms/panel_admin', $data);
		$this->load->view('cms/footer', $data);

	} // panel_admin

	function login(){

		// recibe credenciales
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];

		// validar si las credenciales son válidas
		$this->load->model('usuario');
		$existe_usuario = $this->usuario->valida_usuario($usuario, $password);

		// Carga vista de login o index en caso de credenciales correctas
		if($existe_usuario == 0){
			$data['error'] = 'Nombre de usuario o contraseña incorrectos';
			$this->load->view('cms/header', $data);
			$this->load->view('cms/login', $data);
		} else {
			// guarda datos de usuario en sesión
			$data['usuario'] = $existe_usuario;
			session_start();
			$_SESSION['id_usuario'] =  $data['usuario']['id_usuario'];
			$_SESSION['usuario'] =  $data['usuario']['usuario'];
			$_SESSION['is_admin'] =  $data['usuario']['is_admin'];

			$this->load->view('cms/header', $data);
			$this->load->view('cms/panel_admin', $data);
		}

		$this->load->view('cms/footer', $data);

	}// login

	function logout(){
		// destruye sesión actual
		session_start();
		session_destroy();
		unset($_SESSION);
		redirect('/login/', 'refresh');
	}// logout

	function administrar_usuarios(){
		// datos usuario
		session_start();
		$data['id_usuario'] = $_SESSION['id_usuario'];

		$this->load->model('usuario');
		$data['usuarios'] = $this->usuario->dame_usuarios();

		// Carga vista de login o index en caso de credenciales correctas
		$this->load->view('cms/header', $data);
		$this->load->view('cms/administrar_usuarios', $data);
		$this->load->view('cms/footer');
	}// administrar_usuarios

	function agregar_usuario(){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// Cacha datos al hacer update
		if(isset($_POST['usuario'])){
			$usuario = $_POST['usuario'];
			$password = $_POST['password'];
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$rol = $_POST['rol'];

			// ¿es administrador?
			if($rol == 'admin')
				$is_admin = 't';
			else
				$is_admin = 'f';

			// agrega usuario a base de datos
			if( ! $this->usuario->existe($usuario)){
				if($this->usuario->agrega_usuario($usuario, $password, $nombre, $apellidos, $is_admin)){
					$data['success'] = '¡Se agregó el usuario con éxito!';
				} else {
					$data['error'] = 'No se pudo agregar el usuario.';
				}
			} else { 
				$data['error'] = 'El usuario '.$usuario.' ya existe.';
			}

		}

		// Carga vista de login o index en caso de credenciales correctas
		$this->load->view('cms/header', $data);
		$this->load->view('cms/agregar_usuario', $data);
		$this->load->view('cms/footer');
	}// agregar_usuario

	function editar_usuario($id){
		// datos usuario
		session_start();
		$data['id_usuario'] = $_SESSION['id_usuario'];

		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id);

		// Cacha datos al hacer update
		if(isset($_POST['id_usuario'])){
			$usuario = $_POST['usuario'];
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$password = $_POST['password'];
			$rol = $_POST['rol'];

			// ¿es administrador?
			if($rol == 'admin')
				$is_admin = 't';
			else
				$is_admin = 'f';

			// agrega usuario a base de datos
			if($this->usuario->edita_usuario($_POST['id_usuario'], $usuario, $password, $nombre, $apellidos, $is_admin)){
				$data['success'] = '¡Se editó el usuario con éxito!';
			} else {
				$data['error'] = 'No se pudo agregar el usuario.';
			}
			// Carga info actualizada
			$data['usuario'] = $this->usuario->dame_usuario($_POST['id_usuario']);
		}

		// Carga vista de login o index en caso de credenciales correctas
		$this->load->view('cms/header', $data);
		$this->load->view('cms/editar_usuario', $data);
		$this->load->view('cms/footer');
	}// editar_usuario

	function agregar_contenido(){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);
		$data['seccion'] = 'Agregar contenido';

		// Carga vista de login o index en caso de credenciales correctas
		$this->load->view('cms/header', $data);
		$this->load->view('cms/agregar_contenido', $data);
		$this->load->view('cms/footer', $data);
	}// agregar_contenido

	function editar_contenido($id){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// datos usuario
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id);

		// carga avisos
		$this->load->model('aviso');
		$data['avisos'] = $this->aviso->dame_avisos();

		// carga anuncios
		$this->load->model('anuncio');
		$data['anuncios'] = $this->anuncio->dame_anuncios();

		// carga preguntas
		$this->load->model('pregunta');
		$data['preguntas'] = $this->pregunta->dame_preguntas();

		$this->load->view('cms/header', $data);
		$this->load->view('cms/editar_contenido', $data);
		$this->load->view('cms/footer');
	}// editar_contenido

	function agregar_aviso(){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		$aviso = $_POST['aviso'];
		$url_aviso = $_POST['url_aviso'];
		$fecha_inicial = $_POST['fecha_inicial'];
		$fecha_final = $_POST['fecha_final'];
		if($url_aviso == '-'){
			$tipo = 'texto';
		} else {
			$tipo = 'link';
		}

		// usuario que agrega el aviso
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// inserta aviso a bd
		$this->load->model('aviso');
		if($this->aviso->agrega_aviso($aviso, $url_aviso, $tipo, $id_usuario, $fecha_inicial, $fecha_final, 't')){
			$data['success'] = '¡Se agregó el aviso con éxito!';
		} else {
			$data['error'] = 'No se pudo agregar el aviso.';
		}

		$data['seccion'] = 'Agregar contenido';

		$this->load->view('cms/header');
		$this->load->view('cms/agregar_contenido', $data);
		$this->load->view('cms/footer', $data);
	}// agregar_aviso

	/**
	 * Descripción: Editar un aviso existente
	 * @param integer $id_aviso
	 * @return nada
	 */
	function editar_aviso($id_aviso){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// carga modelo
		$this->load->model('aviso');

		// ¿se está editando el aviso?
		if(isset($_POST['id_usuario'])){
			$aviso = $_POST['aviso'];
			$tipo = $_POST['tipo'];
			$url = $_POST['url_aviso'];
			$fecha_inicial = $_POST['fecha_inicial'];
			$fecha_final = $_POST['fecha_final'];
			$activo = $_POST['activo'];

			if(trim($url) == '' || trim($url) == '-'){
				$url = '-';
				$tipo = 'texto';
			} else {
				$tipo = 'link';
			}
			if ($activo == 'on')
				$activo = 't';
			else
				$activo = 'f';

			$this->aviso->actualiza_aviso($id_aviso, $aviso, $url, $tipo, $fecha_inicial,$fecha_final, $activo);
			$data['success'] = '¡Aviso actualizado!';
		}

		// busca aviso
		$data['aviso'] = $this->aviso->dame_aviso($id_aviso);

		// seccion actual
		$data['seccion'] = 'Editar aviso';

		// Carga vista con información del aviso
		$this->load->view('cms/header', $data);
		$this->load->view('cms/editar_aviso', $data);
		$this->load->view('cms/footer');
	}// editar_aviso

	/**
	 * Descripción: Eliminar un aviso existente
	 * @param integer $id_aviso
	 * @return nada
	 */
	function eliminar_aviso($id_aviso){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// usuario que elimina el aviso
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// carga modelo
		$this->load->model('aviso');
		// elimina aviso
		$this->aviso->elimina_aviso($id_aviso);

		$this->editar_contenido();

	}// eliminar_aviso

	function agregar_pregunta(){
		// inicia sesisón activa
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// datos a insertar
		$pregunta = $_POST['pregunta'];
		$fecha_inicial = $_POST['fecha_inicial'];
		$fecha_final = $_POST['fecha_final'];

		// usuario que agrega el aviso
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// inserta pregunta a bd
		$this->load->model('pregunta');
		if($this->pregunta->agrega_pregunta($pregunta, $id_usuario, $fecha_inicial, $fecha_final, 't')){
			$data['success'] = '¡Se agregó la pregunta con éxito!';
		} else {
			$data['error'] = 'No se pudo agregar la pregunta.';
		}

		$data['seccion'] = 'Agregar contenido';

		$this->load->view('cms/header');
		$this->load->view('cms/agregar_contenido', $data);
		$this->load->view('cms/footer', $data);
	}// agregar_pregunta

	/**
	 * Descripción: Editar una pregunta existente
	 * @param integer $id_pregunta
	 * @return nada
	 */
	function editar_pregunta($id_pregunta){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// busca pregunta
		$this->load->model('pregunta');

		// ¿se está editando el aviso?
		if(isset($_POST['id_usuario'])){
			$pregunta = $_POST['pregunta'];
			$fecha_inicial = $_POST['fecha_inicial'];
			$fecha_final = $_POST['fecha_final'];
			$activo = $_POST['activo'];
			if ($activo == 'on')
				$activo = 't';
			else
				$activo = 'f';

			$this->pregunta->actualiza_pregunta($id_pregunta, $pregunta, $fecha_inicial, $fecha_final, $activo);
			$data['success'] = '¡Pregunta actualizada!';
		}
		$data['pregunta'] = $this->pregunta->dame_pregunta($id_pregunta);

		// seccion actual
		$data['seccion'] = 'Editar pregunta';

		// Carga vista con información de la pregunta
		$this->load->view('cms/header');
		$this->load->view('cms/editar_pregunta', $data);
		$this->load->view('cms/footer');
	}// editar_pregunta

	/**
	 * Descripción: Eliminar una pregunta existente
	 * @param integer $id_pregunta
	 * @return nada
	 */
	function eliminar_pregunta($id_pregunta){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// usuario que elimina el pregunta
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// carga modelo
		$this->load->model('pregunta');
		// elimina pregunta
		$this->pregunta->elimina_pregunta($id_pregunta);

		$this->editar_contenido();

	}// eliminar_pregunta

	function agregar_anuncio(){
		// inicia sesión activa
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// ruta para guardar archivos de slider
		$config['upload_path'] = '../directorio/assets/img/anuncios';

		// limitaciones de archivo a subir
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '500';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		// datos a insertar
		$anuncio = $_POST['anuncio'];
		$url_anuncio = $_POST['url_anuncio'];
		$fecha_inicial = $_POST['fecha_inicial'];
		$fecha_final = $_POST['fecha_final'];
		if($url_anuncio == '-'){
			$tipo = 'texto';
		} else {
			$tipo = 'link';
		}

		$data['seccion'] = 'Agregar contenido';

		// usuario que agrega el aviso
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// sube archivos
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload())
		{
			// No se pudo subir el archivo, manda errores a la vista
			$data['error'] = $this->upload->display_errors();
		}
		else
		{
			// guardar imagen de slider
			$data['upload'] = $this->upload->data();

			// url relativa de la imagen
			$img_url = explode('directorio/', $data['upload']['full_path']);

			// inserta anuncio a bd
			$this->load->model('anuncio');
			if($this->anuncio->agrega_anuncio($anuncio, $id_usuario, $tipo, $url_anuncio, $img_url[1], $fecha_inicial, $fecha_final, 't')){
				$data['success'] = '¡Se agregó el anuncio con éxito!';
			} else {
				$data['error'] = 'No se pudo agregar el anuncio.';
			}
		}
		// carga vistas
		$this->load->view('cms/header');
		$this->load->view('cms/agregar_contenido', $data);
		$this->load->view('cms/footer', $data);

	}// agregar_anuncio

	/**
	 * Descripción: Editar un anuncio existente
	 * @param integer $id_anuncio
	 * @return nada
	 */
	function editar_anuncio($id_anuncio){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// busca anuncio
		$this->load->model('anuncio');

		// ¿se está editando el anuncio?
		if(isset($_POST['id_usuario'])){
			// datos a actualizar
			$anuncio = $_POST['anuncio'];
			$url_anuncio = $_POST['url_anuncio'];
			$fecha_inicial = $_POST['fecha_inicial'];
			$fecha_final = $_POST['fecha_final'];
			$cambiar_img = $_POST['subir_img'];
			$url_img_anterior = $_POST['url_img_anterior'];
			$img_url = $url_img_anterior;

			if(trim($url_anuncio) == '' || trim($url_anuncio) == '-'){
				$url_anuncio = '-';
				$tipo = 'texto';
			} else {
				$tipo = 'link';
			}
			if ($_POST['activo'] == 'on')
				$activo = 't';
			else
				$activo = 'f';

			// ¿hay que volver a subir la imagen?
			if($cambiar_img == 'on'){
				// ruta para guardar archivos de slider
				$config['upload_path'] = '../directorio/assets/img/anuncios';

				// limitaciones de archivo a subir
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '500';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				// sube archivos
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload())
				{
					// No se pudo subir el archivo, manda errores a la vista
					$data['error'] = $this->upload->display_errors();
				}
				else
				{
					// guardar imagen de slider
					$data['upload'] = $this->upload->data();

					// url relativa de la imagen
					$img_url_arr = explode('directorio/', $data['upload']['full_path']);
					$img_url = $img_url_arr[1];
				}// if
			}// if

			// inserta anuncio a bd
			$this->load->model('anuncio');
			if($this->anuncio->actualiza_anuncio($id_anuncio, $anuncio, $url_anuncio, $img_url, $tipo, $fecha_inicial, $fecha_final, $activo)){
				$data['success'] = '¡Se actualizó el anuncio con éxito!';
			} else {
				$data['error'] = 'No se pudo actualizar el anuncio.';
			} // if upload con éxito

		}// if POST

		$data['anuncio'] = $this->anuncio->dame_anuncio($id_anuncio);

		// sección actual
		$data['seccion'] = 'Editar anuncio';

		// Carga vista con información del anuncio
		$this->load->view('cms/header', $data);
		$this->load->view('cms/editar_anuncio', $data);
		$this->load->view('cms/footer', $data);
	}// editar_anuncio

	/**
	 * Descripción: Eliminar un anuncio existente
	 * @param integer $id_anuncio
	 * @return nada
	 */
	function eliminar_anuncio($id_anuncio){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];

		// usuario que elimina el anuncio
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// carga modelo
		$this->load->model('anuncio');
		// elimina anuncio
		$this->anuncio->elimina_anuncio($id_anuncio);

		$this->editar_contenido();

	}// eliminar_anuncio

	/**
	 * Descripción: Método para trámites y servicios mas solicitados
	 * @param
	 * @return
	 */
	function mas_solicitados(){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);


		// Variable de conexión a web services
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Carga nombre y id de todos los trámites y servicios
		// para la función de autocompletar
		$nombres_ts =  file_get_contents($url_ws.'/nombres_ts/format/json');
		if(is_null($nombres_ts))
			$data['nombres_ts'] = '';
		else
			$data['nombres_ts'] = $nombres_ts;

		// Obtener id de trámites y servicios mas comunes
		$this->load->model('ts_comun');
		$id_ts = $this->ts_comun->dame_ts_comunes();

		// Obtener nombres de trámites y servicios via WS
		$nombres_ts_comunes =  file_get_contents($url_ws.'/nombres_ts_comunes/id/'.$id_ts.'/format/json');
		if(is_null($nombres_ts_comunes))
			$data['nombres_ts_comunes'] = '';
		else
			$data['nombres_ts_comunes'] = json_decode($nombres_ts_comunes);

		// Omitir de la búsqueda avanzada los trámites y servicios
		// que ya existen entre los mas comunes para evitar duplicados
		$ts_a_omitir = array();
		foreach ($data['nombres_ts_comunes'] as $key => $value) {
			$ts_a_omitir[$key] = $value->id_tramite_servicio;
		}
		$data['ts_a_omitir'] = json_encode($ts_a_omitir);

		// Carga vista con información del anuncio
		$this->load->view('cms/header', $data);
		$this->load->view('cms/mas_solicitados', $data);
		$this->load->view('cms/footer', $data);

	}// mas_solicitados

	/**
	 * Descripción: Agregar trámite/servicio mas solicitado
	 * @param
	 * @return
	 */
	function agregar_ts_solicitado(){
		// respuesta JSON para AJAX
		$respuesta = array();
		$id_ts = $_POST['id_ts'];

		// carga modelo
		$this->load->model('ts_comun');
		// Revisar si hay mas de 15 trámites/servicios
		$total =  $this->ts_comun->total_ts_comunes();
		if($total >= 6){
			$respuesta['estatus'] = 'error';
			$respuesta['msg'] = '¡Ya hay 6 trámites/servicios mas comunes! Elimina un registro para poder agregar más.';
		} else if( $this->ts_comun->existe($id_ts) ) {
			$respuesta['estatus'] = 'error';
			$respuesta['msg'] = 'Ya existe el trámite/servicio que deseas agregar.';
		} else {
			$this->ts_comun->agrega_ts_comun($id_ts, 't');
			$respuesta['estatus'] = 'success';
		}
		$this->output->set_output(json_encode($respuesta));
	}// agregar_ts_solicitado

	/**
	 * Descripción: Agregar trámite/servicio mas solicitado
	 * @param
	 * @return
	 */
	function eliminar_ts_solicitado(){
		// respuesta JSON para AJAX
		$respuesta = array();
		$id_ts = $_POST['id_ts'];

		// carga modelo
		$this->load->model('ts_comun');
		// Eliminar trámite servicio común
		$this->ts_comun->elimina_ts_comun($id_ts);
		#$respuesta['msg'] = 'Trámite/servicio eliminado.';

		$this->output->set_output(json_encode($respuesta));
	}// eliminar_ts_solicitado

	/**
	 * Descripción: Ver respuestas de pregutnas
	 * @param integer $id_pregunta
	 * @return
	 */
	function ver_respuestas($id_pregunta){
		session_start();
		// carga pregunta
		$this->load->model('pregunta');
		$data['pregunta'] = $this->pregunta->dame_pregunta($id_pregunta);

		// carga respuestas
		$this->load->model('respuesta');
		$respuestas = $this->respuesta->dame_respuestas($id_pregunta);

		// Calcular total de respuestas si y no
		$num_respuestas = 0;
		$num_si = 0;
		$num_no = 0;
		foreach ($respuestas as $key => $value) {
			$num_respuestas = $num_respuestas + 1;
			if($value['respuesta'] == 't')
				$num_si = $num_si + 1;
			else
				$num_no = $num_no + 1;
		}
		$si_porcentaje = $num_si/$num_respuestas*100;
		$no_porcentaje = $num_no/$num_respuestas*100;

		$data['num_respuestas'] = $num_respuestas;
		$data['num_si'] = $num_si;
		$data['num_no'] = $num_no;
		$data['si_porcentaje'] = $si_porcentaje;
		$data['no_porcentaje'] = $no_porcentaje;

		$data['seccion'] = 'Ver respuestas';

		// Carga vista con información del anuncio
		$this->load->view('cms/header', $data);
		$this->load->view('cms/ver_respuestas', $data);
		$this->load->view('cms/footer', $data);
	}// eliminar_ts_solicitado

	/**
	 * Descripción: Muestra panel de reportes
	 * @param
	 * @return
	 */
	function panel_reportes(){
		// datos usuario
		session_start();
		$id_usuario = $_SESSION['id_usuario'];
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// Variable de conexión a web services
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Carga nombre y id de todos los trámites y servicios
		// para la función de autocompletar
		$nombres_ts =  file_get_contents($url_ws.'/nombres_ts/format/json');
		if(is_null($nombres_ts))
			$data['nombres_ts'] = '';
		else
			$data['nombres_ts'] = $nombres_ts;

		// sección actual
		$data['seccion'] = 'Panel reportes';

		$this->load->view('cms/header', $data);
		$this->load->view('cms/panel_reportes', $data);
		$this->load->view('cms/footer', $data);
	}// panel_reportes

	/**
	 * Descripción: Muestra reporte de trámite o servicio
	 * @param
	 * @return
	 */
	function muestra_reporte_ts(){
		// respuesta JSON para AJAX
		$respuesta = array();
		$visitas = array();
		$id_ts = $_POST['id_ts'];

		// carga consultas
		$this->load->model('visitas_ts');
		$visitas = $this->visitas_ts->dame_visitas($id_ts);

		// carga feedback
		$this->load->model('feedback');
		$feedback = $this->feedback->dame_feedback($id_ts);

		// JSON de respuesta
		$respuesta['visitas'] = $visitas;
		$respuesta['feedback'] = $feedback;

		$this->output->set_output(json_encode($respuesta));
	}// muestra_reporte_ts

}// Gestor_contenidos