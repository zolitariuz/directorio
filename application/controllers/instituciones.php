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
	} // constructor

	/**
	 * Descripción: Muestra todos los entes padre
	 * @param 
	 * @return 
	 */
	function index()
	{
		// Datos de conexión para WS
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Carga todos los temas (materias)
		$instituciones = file_get_contents($url_ws.'/instituciones/format/json');
		if(is_null($instituciones))
			$data['instituciones'] = '';
		else
			$data['instituciones'] = json_decode($instituciones);

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

		$data['seccion'] = 'Instituciones';

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('instituciones', $data);
		$this->load->view('footer', $data);
	} // index

	/**
	 * Descripción: Muestra todos los trámites/servicios por ente
	 * @param integer $id_institucion
	 * @return 
	 */
	function muestraTS($id_institucion)
	{
		// Datos de conexión para WS
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Carga todos los trámites y servicios por tema
		$ts_institucion = file_get_contents($url_ws.'/ts_institucion/id/'.$id_institucion.'/format/json');
		if(is_null($ts_institucion))
			$data['ts_institucion'] = '';
		else
			$data['ts_institucion'] = json_decode($ts_institucion);

		// carga avisos
		$this->load->model('aviso');
		$data['avisos'] = $this->aviso->dame_avisos_activos();

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('ts_institucion', $data);
		$this->load->view('footer', $data);
	} // muestraTS

	/**
	 * Descripción: Muestra instituciones 
	 * @param
	 * @return
	 */
	public function oficinas_atencion_ciudadana(){
		// Datos de conexión para WS
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Carga instituciones
		$instituciones = file_get_contents($url_ws.'/instituciones/format/json');
		if(is_null($instituciones))
			$data['instituciones'] = '';
		else
			$data['instituciones'] = json_decode($instituciones);

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

		$data['seccion'] = 'Oficinas atencion';

		$this->load->view('header', $data);
		$this->load->view('oficinas_atencion_ciudadana', $data);
		$this->load->view('footer', $data);
	}// oficinas_atencion_ciudadana

	/**
	 * Descripción: Muestra oficinas de atención para una institución específica
	 * @param integer $id_institucion
	 * @return 
	 */
	function muestraOficinasInstitucion($id_institucion)
	{
		// Datos de conexión para WS
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Carga areas de atención 
		$area_atencion =  file_get_contents($url_ws.'/oficinas/id/'.$id_institucion.'/format/json');

		if(is_null($area_atencion))
			$data['area_atencion'] = '';
		else
			$data['area_atencion'] = $this->dameAreasAtencion(json_decode($area_atencion));

		// Carga institucion 
		$institucion =  file_get_contents($url_ws.'/institucion/id/'.$id_institucion.'/format/json');
		if(is_null($institucion))
			$data['institucion'] = '';
		else
			$data['institucion'] = json_decode($institucion);

		// Carga nombre y id de todos los trámites y servicios
		// para la función de autocompletar
		$nombres_ts =  file_get_contents($url_ws.'/nombres_ts/format/json');
		if(is_null($nombres_ts))
			$data['nombres_ts'] = '';
		else
			$data['nombres_ts'] = $nombres_ts;

		// Sección actual
		$data['seccion'] = 'Oficina por institución';

		// carga avisos
		$this->load->model('aviso');
		$data['avisos'] = $this->aviso->dame_avisos_activos();

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('oficinas_institucion', $data);
		$this->load->view('footer', $data);
	} // muestraOficinasInstitucion

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
		    	'telefono_1' 	=> $value->telefono_1,
		    	'ext_1' 		=> $value->ext_1,
		    	'telefono_2' 	=> $value->telefono_2,
		    	'ext_2' 		=> $value->ext_2,
		    	'url_ubicacion'	=> $value->url_ubicacion,
				);
		}
		return $areas_atencion_json;
	} // dameAreasAtencion

}// class Instituciones