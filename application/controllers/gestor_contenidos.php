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
		// Validar forma de autenticación usando CI
		$this->load->library('form_validation');
		$this->form_validation->set_rules(array(
			array(
				'field'	=> 'usuario',
				'label' => 'Usuario',
				'rules' => 'required',
			),
			array(
				'field'	=> 'password',
				'label' => 'Contraseña',
				'rules' => 'required',
			)
		));

		// Se utiliza en caso de que las credenciales sean inválidas
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		// recibe credenciales
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];

		// validar si las credenciales son válidas
		$this->load->model('usuario');
		$existe_usuario = $this->usuario->valida_usuario($usuario, $password);

		// Carga vista de login o index en caso de credenciales correctas
		if(!$this->form_validation->run() || $existe_usuario == 0){
			if($existe_usuario == 0){
				$data['error'] = 'Nombre de usuario o contraseña incorrectos';
			}
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
		session_destroy();
		// muestra login
		$this->login();
	}// logout

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
			if($this->usuario->agrega_usuario($usuario, $password, $nombre, $apellidos, $is_admin)){
				$data['success'] = '¡Se agregó el usuario con éxito!';
			} else {
				$data['error'] = 'No se pudo agregar el usuario.';
			}
		}

		// Carga vista de login o index en caso de credenciales correctas
		$this->load->view('cms/header', $data);
		$this->load->view('cms/agregar_usuario', $data);
		$this->load->view('cms/footer');
	}// agregar_usuario

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

		// Carga vista de login o index en caso de credenciales correctas
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
		if($this->aviso->agrega_aviso($aviso, $url_aviso, $tipo, $id_usuario)){
			$data['success'] = '¡Se agregó el aviso con éxito!';
		} else {
			$data['error'] = 'No se pudo agregar el aviso.';
		}

		$data['seccion'] = 'Agregar contenido';

		// Carga vista de login o index en caso de credenciales correctas
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
		// carga modelo 
		$this->load->model('aviso');

		// ¿se está editando el aviso?
		if(isset($_POST['id_usuario'])){
			$aviso = $_POST['aviso'];
			$tipo = $_POST['tipo'];
			$url = $_POST['url_aviso'];
			$this->aviso->actualiza_aviso($id_aviso, $aviso, $url, $tipo);
		} 

		// busca aviso
		$data['aviso'] = $this->aviso->dame_aviso($id_aviso);
		
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

		// usuario que agrega el aviso
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// inserta pregunta a bd
		$this->load->model('pregunta');
		if($this->pregunta->agrega_pregunta($pregunta, $id_usuario)){
			$data['success'] = '¡Se agregó la pregunta con éxito!';
		} else {
			$data['error'] = 'No se pudo agregar la pregunta.';
		}

		$data['seccion'] = 'Agregar contenido';

		// Carga vista de login o index en caso de credenciales correctas
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
		// datos de usuario
		//$id_usuario = $this->session->userdata('id');

		$data['usuario'] = $this->session;

		// busca pregunta
		$this->load->model('pregunta');
		$data['pregunta'] = $this->pregunta->dame_pregunta($id_pregunta);
		
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
			if($this->anuncio->agrega_anuncio($anuncio, $id_usuario, $tipo, $url_anuncio, $img_url[1])){
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
		// datos a insertar
		$id_usuario = $this->session->userdata('id');

		// busca anuncio
		$this->load->model('anuncio');
		$data['anuncio'] = $this->anuncio->dame_anuncio($id_anuncio);
		
		// Carga vista con información del anuncio
		$this->load->view('cms/header');
		$this->load->view('cms/editar_anuncio', $data);
		$this->load->view('cms/footer');
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

}// Gestor_contenidos