<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Gestor_contenidos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Esconde warnings
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


		$this->load->helper(array('form', 'url'));
		$this->load->library('session');

	} // constructor

	/**
	 * Descripción: Panel de administración de contenidos
	 * Input:		ninguno
	 */
	function panel_admin($id)
	{
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
		$this->load->view('cms/header', $data);
		if(!$this->form_validation->run() || $existe_usuario == 0){
			if($existe_usuario == 0){
				$data['error'] = 'Nombre de usuario o contraseña incorrectos';
			}
			$this->load->view('cms/login', $data);
		} else {
			// guarda datos de usuario en sesión
			$data['usuario'] = $existe_usuario;
			$datos_usuario = array(
				'id'		=> $data['usuario']['id_usuario'], 
				'usuario'	=> $data['usuario']['usuario'], 
				'nombre'	=> $data['usuario']['nombre'], 
				'apellidos'	=> $data['usuario']['apellidos'], 
				'is_admin'	=> $data['usuario']['is_admin'], 
				
				);
			$this->session->set_userdata($datos_usuario);

			$data['usuario'] = $existe_usuario;
			$this->load->view('cms/panel_admin', $data);
		}
		
		$this->load->view('cms/footer', $data);

	}// login

	function agregar_contenido(){
		// datos usuario
		$id_usuario = $this->session->userdata('id');

		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// Carga vista de login o index en caso de credenciales correctas
		$this->load->view('cms/header', $data);
		$this->load->view('cms/agregar_contenido', $data);
		$this->load->view('cms/footer');
	}// agregar_contenido

	function editar_contenido($id){
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

		// datos a insertar
		$id_usuario = $_POST['id_usuario'];
		$aviso = $_POST['aviso'];
		$url_aviso = $_POST['url_aviso'];
		if($url_aviso == ''){
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
			$data['sucess'] = 'Se agrego el aviso con éxito.';
		} else {
			$data['error'] = 'No se pudo agregar el aviso.';
		}

		// Carga vista de login o index en caso de credenciales correctas
		$this->load->view('cms/header');
		$this->load->view('cms/index', $data);
		$this->load->view('cms/footer');
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

	function agregar_pregunta(){
		// datos a insertar
		$id_usuario = $_POST['id_usuario'];
		$pregunta = $_POST['pregunta'];

		// usuario que agrega el aviso
		$this->load->model('usuario');
		$data['usuario'] = $this->usuario->dame_usuario($id_usuario);

		// inserta pregunta a bd
		$this->load->model('pregunta');
		if($this->pregunta->agrega_pregunta($pregunta, $id_usuario)){
			$data['sucess'] = 'Se agrego la pregunta con éxito.';
		} else {
			$data['error'] = 'No se pudo agregar la pregunta.';
		}

		// Carga vista de login o index en caso de credenciales correctas
		$this->load->view('cms/header');
		$this->load->view('cms/index', $data);
		$this->load->view('cms/footer');
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

	function agregar_anuncio(){
		// ruta para guardar archivos de slider
		$config['upload_path'] = '../directorio/assets/img/anuncios';
		
		// limitaciones de archivo a subir
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		// datos a insertar
		$id_usuario = $this->session->userdata('id');
		$anuncio = $_POST['anuncio'];
		$url_anuncio = $_POST['url_anuncio'];
		if($url_anuncio == ''){
			$tipo = 'texto';
		} else {
			$tipo = 'link';
		}

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
			
			$this->load->view('cms/index');
		}
		else
		{
			// guardar imagen de slider
			$data['upload'] = $this->upload->data();

			// url relativa de la imagen
			$img_url = explode('directorio', $data['upload']['full_path']);

			// inserta anuncio a bd
			$this->load->model('anuncio');
			if($this->anuncio->agrega_anuncio($anuncio, $id_usuario, $tipo, $url_anuncio, $img_url[1])){
				$data['sucess'] = 'Se agrego el anuncio con éxito.';
			} else {
				$data['error'] = 'No se pudo agregar el anuncio.';
			}
			
			
		}
		// carga vistas
		$this->load->view('cms/header');
		$this->load->view('cms/index', $data);
		$this->load->view('cms/footer');

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

}// Gestor_contenidos