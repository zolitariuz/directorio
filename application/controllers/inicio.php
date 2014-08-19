<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

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
		// Carga modelo con info de trámites
		$this->load->model('info_ts');

		// Datos de conexión para WS
		$this->usuarioWS = 'admin_ts';		
		$this->passwordWS = '@dm1n_TS_123';
		$this->urlPortalWS = 'localhost:8888/tramites_cdmx_ws/';
		$this->urlWS = 'http://'.$this->usuarioWS.':'.$this->passwordWS.'@'.$this->urlPortalWS.'index.php/api/';
	}

	function index()
	{
		// Se utiliza en caso de que exista error en alguna consulta
		$data['error'] = $_GET['error'];

		// Muestra trámites y servicios mas buscados usando WS
		$data['tramites_mas_buscados'] = json_decode(
		    file_get_contents($this->urlWS.'/tramites/format/json')
		);
		$data['servicios_mas_buscados'] = json_decode(
		    file_get_contents($this->urlWS.'/servicios/format/json')
		);
		
		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('inicio', $data);
		$this->load->view('footer', $data);
	}

	function muestraTramiteServicio($idTramite){

		// Carga info de un trámite o servicio 
		$ts =  file_get_contents($this->urlWS.'/info_tramite/id/'.$idTramite.'/format/json');
		if(is_null($ts))
			$data['ts'] = '';
		else	
			$data['ts'] = json_decode($ts);

		// Carga requisitos de un trámite o servicio 
		$requisitos = file_get_contents($this->urlWS.'/requisitos/id/'.$idTramite.'/format/json');
		if(is_null($requisitos))
			$data['requisitos'] = '';
		else
			$data['requisitos'] = json_decode($requisitos);

		// Carga requisitos específicos de un trámite o servicio
		$requisitos_esp = file_get_contents($this->urlWS.'/requisitos_esp/id/'.$idTramite.'/format/json');
		if(is_null($requisitos_esp))	
			$data['requisitos_esp'] = '';
		else
			$data['requisitos_esp'] = json_decode($requisitos_esp);

		// Carga formatos de un trámite o servicio
		$formatos =  file_get_contents($this->urlWS.'/formatos/id/'.$idTramite.'/format/json');
		if(is_null($formatos))
			$data['formatos'] = '';
		else
			$data['formatos'] = json_decode($formatos);

		// Carga areas de atención de un trámite o servicio
		$area_atencion =  file_get_contents($this->urlWS.'/area_atencion/id/'.$idTramite.'/format/json');
		if(is_null($area_atencion))
			$data['area_atencion'] = '';
		else
			$data['area_atencion'] = $this->dameAreasAtencion(json_decode($area_atencion));

		// Carga areas de atención de un trámite o servicio
		$documento =  file_get_contents($this->urlWS.'/documento/id/'.$idTramite.'/format/json');
		if(is_null($documento))
			$data['documento'] = '';
		else
			$data['documento'] = $this->dameDocumentos(json_decode($documento));

		// Cargar vista tramite
		// en caso de error, redirecciona al inicio
		$this->load->view('header');
		if($ts != '')
			$this->load->view('tramite', $data);
		else
			header('Location: '.base_url().'?error=1');
		$this->load->view('footer', $data);
	}

	private function dameAreasAtencion($area_atencion){
		$infoMapas = array();
		foreach ($area_atencion as $key => $value) {
			$infoMapas[$key] = array(
				'nombre'		=> $value->nombre,
				'calle_numero' 	=> $value->calle_numero,
		    	'delegacion' 	=> $value->delegacion,
		    	'colonia' 		=> $value->colonia,
		    	'cp' 			=> $value->cp,
		    	'telefonos' 	=> $value->telefonos,
		    	'url_ubicacion'	=> $value->url_ubicacion,
				);
		}
		return json_encode($infoMapas);
	}

	private function dameDocumentos($docs){
		$documentos = array();
		foreach ($docs as $key => $value) {
			$vigenciaArray = explode('_', $value->vigencia);
			if($vigenciaArray[0] == 1){
				$
			}
			$vigencia = $value->vigencia;

			$documentos[$key] = array(
				'nombreDocumento'		=> $value->descripcion,
				'vigencia' 				=> $vigencia,
				);
		}
		return $documentos;
	}


}