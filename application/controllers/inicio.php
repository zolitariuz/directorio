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
		$data['ts_mas_populares'] = json_decode(
		    file_get_contents($this->urlWS.'/tramites_servicios/format/json')
		);

		// Carga nombre y id de todos los trámites y servicios
		// para la función de autocompletar
		$nombres_ts =  file_get_contents($this->urlWS.'/nombres_ts/format/json');
		if(is_null($nombres_ts))
			$data['nombres_ts'] = '';
		else
			$data['nombres_ts'] = $nombres_ts;

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('inicio', $data);
		$this->load->view('footer', $data);
	} // index

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
	} // muestraTramiteServicio

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
	} // dameAreasAtencion

	private function dameDocumentos($docs){
		$documentos = array();
		foreach ($docs as $key => $value) {
			// Tratamiento de cadena de vigencia
			$vigenciaArray = explode('_', $value->vigencia);
			$vigencia = $vigenciaArray[1];
			if($vigenciaArray[0] == DE_DURACION){
				switch($vigenciaArray[2]){
					case HORAS:
						$vigencia = $vigencia.' horas.';
						break;
					case DIAS_NATURALES:
						$vigencia = $vigencia.' días naturales.';
						break;
					case DIAS_HABILES:
						$vigencia = $vigencia.' días hábiles.';
						break;
					case SEMANAS:
						$vigencia = $vigencia.' semana(s).';
						break;
					case MESES:
						$vigencia = $vigencia.' mes(es).';
						break;
					case AÑOS:
						$vigencia = $vigencia.' año(s).';
						break;
				}// switch
			} else if($vigenciaArray[0] == RANGO_DURACION){
				$vigencia = $vigenciaArray[1];
			} else if($vigenciaArray[0] == OTRA_DURACION){
				$vigencia = 'Otra vigencia?';
			} else {
				switch($vigenciaArray[0]){
					case AÑO_FISCAL:
						$vigencia = 'Por el año fiscal que se otorga.';
						break;
					case PERIODO_RESTANTE:
						$vigencia = 'Por el periodo que reste para concluir la vigencia originalmente otorgada.';
						break;
					case PERMANENTE:
						$vigencia = 'Permanente.';
						break;
					case MAYORIA_EDAD:
						$vigencia = 'Cuando se cumpla la mayoría de edad.';
						break;
					case NO_APLICA:
						$vigencia = 'No aplica.';
						break;
					case INDETERMINADA:
						$vigencia = 'Indeterminada.';
						break;
				}
			}

			$documentos[$key] = array(
				'nombreDocumento'		=> $value->descripcion,
				'vigencia' 				=> $vigencia,
				);
		}
		return $documentos;
	} // dameDocumentos

}