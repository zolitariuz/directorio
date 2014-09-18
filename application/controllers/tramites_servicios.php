<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tramites_servicios extends CI_Controller {

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
	function index($id_tramite)
	{
		
	} // index

	/**
	 * Descripción: Muestra detalle de trámite o servicio
	 * Input:		$id_tramite - id de trámite o servicio
	 */
	function muestraInfo($id_tramite){

		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Suma el número de visitas del trámite/servicio
		$this->load->model('visitas_ts');
		$fecha_visita = date("Y-m-d");  
		$this->visitas_ts->agrega_num_visita($id_tramite, $fecha_visita);

		// Carga info de un trámite o servicio
		$ts =  file_get_contents($url_ws.'/info_tramite/id/'.$id_tramite.'/format/json');
		if(is_null($ts))
			$data['ts'] = '';
		else
			$data['ts'] = json_decode($ts);

		// Carga requisitos de un trámite o servicio
		$requisitos = file_get_contents($url_ws.'/requisitos/id/'.$id_tramite.'/format/json');
		if(is_null($requisitos))
			$data['requisitos'] = '';
		else
			$data['requisitos'] = json_decode($requisitos);

		// Carga requisitos específicos de un trámite o servicio
		$requisitos_esp = file_get_contents($url_ws.'/requisitos_esp/id/'.$id_tramite.'/format/json');
		if(is_null($requisitos_esp))
			$data['requisitos_esp'] = '';
		else
			$data['requisitos_esp'] = json_decode($requisitos_esp);

		// Carga formatos de un trámite o servicio
		$formatos =  file_get_contents($url_ws.'/formatos/id/'.$id_tramite.'/format/json');
		if(is_null($formatos))
			$data['formatos'] = '';
		else
			$data['formatos'] = json_decode($formatos);

		// Carga areas de atención de un trámite o servicio
		$area_atencion =  file_get_contents($url_ws.'/area_atencion/id/'.$id_tramite.'/format/json');
		if(is_null($area_atencion))
			$data['area_atencion'] = '';
		else
			$data['area_atencion'] = $this->dameAreasAtencion(json_decode($area_atencion));

		// Carga documento / beneficio de un trámite o servicio
		$documento =  file_get_contents($url_ws.'/documento/id/'.$id_tramite.'/format/json');
		if(is_null($documento))
			$data['documento'] = '';
		else
			$data['documento'] = $this->dameDocumentos(json_decode($documento));

		// Carga costo(s) de un trámite o servicio
		$costo =  file_get_contents($url_ws.'/costo/id/'.$id_tramite.'/format/json');
		if(is_null($costo))
			$data['costo'] = '';
		else
			$data['costo'] = json_decode($costo);

		// Carga el procedimiento del trámite o servicio
		$procedimiento =  file_get_contents($url_ws.'/procedimiento/id/'.$id_tramite.'/format/json');
		if(is_null($procedimiento))
			$data['procedimiento'] = '';
		else
			$data['procedimiento'] = json_decode($procedimiento);


		// Carga nombre y id de todos los trámites y servicios
		// para la función de autocompletar
		$nombres_ts = file_get_contents($url_ws.'/nombres_ts/format/json');
		if(is_null($nombres_ts))
			$data['nombres_ts'] = '';
		else
			$data['nombres_ts'] = $nombres_ts;


		// carga avisos
		$this->load->model('aviso');
		$data['avisos'] = $this->aviso->dame_avisos_activos();

		$data['seccion'] = 'Tramite';

		// Carga la vista que muestra información de trámites o servicios
		// en caso de error, redirecciona al inicio
		$this->load->view('header', $data);
		if($ts != '')
			$this->load->view('tramite', $data);
		else
			header('Location: '.base_url().'?error=1');
		$this->load->view('footer', $data);
	} // muestraTramiteServicio

	/**
	 * Descripción: Busca datos de áreas de atención pertenecientes a un
	 *              trámite o servicio
	 * @param mixed array $area_atencion 
	 * @return json $areas_atencion_json
	 */
	private function dameAreasAtencion($area_atencion){
		$areas_atencion_json = array();
		foreach ($area_atencion as $key => $value) {
			$areas_atencion_json[$key] = array(
				'nombre'		=> $value->nombre,
				'calle_numero' 	=> $value->calle_numero,
		    	'delegacion' 	=> $value->delegacion,
		    	'colonia' 		=> $value->colonia,
		    	'cp' 			=> $value->cp,
		    	'telefonos' 	=> $value->telefonos,
		    	'url_ubicacion'	=> $value->url_ubicacion,
				);
		}
		return json_encode($areas_atencion_json);
	} // dameAreasAtencion

	/**
	 * Descripción: Le da tratamiento a la cadena de documentos
	 * @param mixed array $docs 
	 * @return mixed array $documentos
	 */
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
				$vigenciaIni = $vigenciaArray[1];
				$vigenciaFin = $vigenciaArray[2];
				switch($vigenciaArray[3]){
					case HORAS:
						$vigencia = 'De '.$vigenciaIni.' a '.$vigenciaFin.' horas.';
						break;
					case DIAS_NATURALES:
						$vigencia = 'De '.$vigenciaIni.' a '.$vigenciaFin.' días naturales.';
						break;
					case DIAS_HABILES:
						$vigencia = 'De '.$vigenciaIni.' a '.$vigenciaFin.' días hábiles.';
						break;
					case SEMANAS:
						$vigencia = 'De '.$vigenciaIni.' a '.$vigenciaFin.' semana(s).';
						break;
					case MESES:
						$vigencia = 'De '.$vigenciaIni.' a '.$vigenciaFin.' mes(es).';
						break;
					case AÑOS:
						$vigencia = 'De '.$vigenciaIni.' a '.$vigenciaFin.' año(s).';
						break;
				}
			} else if($vigenciaArray[0] == OTRA_DURACION){
				$vigencia = 'Otra vigencia?';
			} else if($vigenciaArray[0] == SERVICIO){
				$vigencia = 'No tiene vigencia.';
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

	/**
	 * Descripción: Agrega feedback sobre un trámite/servicio
	 * @param 
	 * @return 
	 */
	public function agregar_feedback(){
		// Carga modelo
		$this->load->model('feedback');

		// Datos a insertar
		$id_tramite_servicio = $_POST['id_ts'];
		$ayuda = $_POST['ayuda'];
		$comentarios = $_POST['comentarios'];
		$calificacion = $_POST['rating'];

		$this->feedback->agrega_feedback($id_tramite_servicio, $comentarios, $calificacion, $ayuda);

		// Carga trámite/servicio
		$this->muestraInfo($id_tramite_servicio);
	} // dameAreasAtencion


}// class Tramites_servicios