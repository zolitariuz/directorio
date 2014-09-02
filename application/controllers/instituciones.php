<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instituciones extends CI_Controller {
	// $usuarioWS y $passwordWS se encuentran en application/config/rest.php
	private $usuarioWS;
	private $passwordWS;
	private $urlPortalWS;
	private $urlWS;

	function __construct()
	{
		parent::__construct();

		// Esconde warnings
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		// Datos de conexión para WS
		$this->usuarioWS = 'admin_ts';
		$this->passwordWS = '@dm1n_TS_123';
		$this->urlPortalWS = 'localhost:8888/tramites_cdmx_ws/';
		$this->urlWS = 'http://'.$this->usuarioWS.':'.$this->passwordWS.'@'.$this->urlPortalWS.'index.php/api/';
	} // constructor

	function index()
	{
		// Carga todos los temas (materias)
		$instituciones = file_get_contents($this->urlWS.'/instituciones/format/json');
		if(is_null($instituciones))
			$data['instituciones'] = '';
		else
			$data['instituciones'] = json_decode($instituciones);

		// Carga nombre y id de todos los trámites y servicios
		// para la función de autocompletar
		$nombres_ts =  file_get_contents($this->urlWS.'/nombres_ts/format/json');
		if(is_null($nombres_ts))
			$data['nombres_ts'] = '';
		else
			$data['nombres_ts'] = $nombres_ts;

		// carga avisos
		$this->load->model('aviso');
		$data['avisos'] = $this->aviso->dame_avisos();

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('instituciones', $data);
		$this->load->view('footer', $data);
	} // index

	function muestraTS($id_institucion){
		// Carga todos los trámites y servicios por tema
		$ts_institucion = file_get_contents($this->urlWS.'/ts_institucion/id/'.$id_institucion.'/format/json');
		if(is_null($ts_institucion))
			$data['ts_institucion'] = '';
		else
			$data['ts_institucion'] = json_decode($ts_institucion);

		// carga avisos
		$this->load->model('aviso');
		$data['avisos'] = $this->aviso->dame_avisos();

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('ts_institucion', $data);
		$this->load->view('footer', $data);
	} // muestraTS

}