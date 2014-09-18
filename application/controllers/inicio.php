<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Esconde warnings
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	} // constructor

	/**
	 * Descripción: Página de inicio
	 * Input:		ninguno
	 */
	function index()
	{
		// Variable de conexión a web services
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Se utiliza en caso de que exista error en alguna consulta
		$data['error'] = $_GET['error'];

		// Obtener id de trámites y servicios mas comunes
		$this->load->model('ts_comun');
		$id_ts = $this->ts_comun->dame_ts_comunes();

		// Obtener nombres de trámites y servicios via WS
		$nombres_ts_comunes =  file_get_contents($url_ws.'/nombres_ts_comunes/id/'.$id_ts.'/format/json');
		if(is_null($nombres_ts_comunes))
			$data['nombres_ts_comunes'] = '';
		else
			$data['nombres_ts_comunes'] = json_decode($nombres_ts_comunes);

		// Carga nombre y id de todos los trámites y servicios
		// para la función de autocompletar
		$nombres_ts =  file_get_contents($url_ws.'/nombres_ts/format/json');
		if(is_null($nombres_ts))
			$data['nombres_ts'] = '';
		else
			$data['nombres_ts'] = $nombres_ts;

		// carga avisos
		$this->load->model('aviso');
		$data['avisos'] = $this->aviso->dame_avisos_activos();

		// carga anuncios
		$this->load->model('anuncio');
		$data['anuncios'] = $this->anuncio->dame_anuncios_activos();

		// carga pregunta de la semana
		$this->load->model('pregunta');
		$data['pregunta'] = $this->pregunta->dame_ultima_pregunta();

		// Carga todos los temas (materias)
		$temas = file_get_contents($this->urlWS.'/temas/format/json');
		if(is_null($temas))
			$data['temas'] = '';
		else
			$data['temas'] = json_decode($temas);

		$data['seccion'] = 'Inicio';

		// Cargar vista de inicio con header y footer
		$this->load->view('header', $data);
		$this->load->view('inicio', $data);
		$this->load->view('footer', $data);
	} // index

	/**
	 * Descripción: Cuenta voto de la pregunta actual
	 * @param
	 * @return
	 */
	public function set_voto(){
		$pregunta = $_POST['pregunta'];
		$respuesta = $_POST['respuesta'];
		$hora = date('Y-m-d H:i:s');

		// carga modelo y agrega respuesta
		$this->load->model('respuesta');
		$this->respuesta->agrega_respuesta($pregunta, $respuesta, $hora);
	}// setVoto
	
}// class Inicio