<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Esconde warnings
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		// Carga modelo con info de trámites
		$this->load->model('info_ts');
	}

	function index()
	{
		$data['error'] = $_GET['error'];

		$data['tramites_mas_buscados'] = json_decode(
		    file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/tramites/format/json')
		);
		$data['servicios_mas_buscados'] = json_decode(
		    file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/servicios/format/json')
		);
		
		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('inicio', $data);
		$this->load->view('footer', $data);
	}

	function muestraTramiteServicio($idTramite){

		// Carga info de un trámite o servicio 
		$ts =  file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/info_tramite/id/'.$idTramite.'/format/json');
		if(is_null($ts))
			$data['ts'] = '';
		else	
			$data['ts'] = json_decode($ts);

		// Carga requisitos de un trámite o servicio 
		$requisitos = file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/requisitos/id/'.$idTramite.'/format/json');
		if(is_null($requisitos))
			$data['requisitos'] = '';
		else
			$data['requisitos'] = json_decode($requisitos);

		// Carga requisitos específicos de un trámite o servicio
		$requisitos_esp = file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/requisitos_esp/id/'.$idTramite.'/format/json');
		if(is_null($requisitos_esp))	
			$data['requisitos_esp'] = '';
		else
			$data['requisitos_esp'] = json_decode($requisitos_esp);

		// Carga formatos de un trámite o servicio
		$formatos =  file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/formatos/id/'.$idTramite.'/format/json');
		if(is_null($formatos))
			$data['formatos'] = '';
		else
			$data['formatos'] = json_decode($formatos);

		// Carga areas de atención de un trámite o servicio
		$area_atencion =  file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/area_atencion/id/'.$idTramite.'/format/json');
		if(is_null($area_atencion))
			$data['area_atencion'] = '';
		else
			$data['area_atencion'] = json_decode($area_atencion);

		// Cargar vista tramite
		// en caso de error, redirecciona al inicio
		$this->load->view('header');
		if($ts != '')
			$this->load->view('tramite', $data);
		else
			header('Location: '.base_url().'?error=1');
		$this->load->view('footer');
	}


}