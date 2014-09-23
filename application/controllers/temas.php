<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temas extends CI_Controller {

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
	 * Descripción: Muestra todos los temas
	 * @param 
	 * @return 
	 */
	function index()
	{
		// Datos de conexión para WS
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Carga todos los temas (materias)
		$temas = file_get_contents($url_ws.'/temas/format/json');
		if(is_null($temas))
			$data['temas'] = '';
		else
			$data['temas'] = json_decode($temas);

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

		// Clase para el ícono de la materia
		$clases_materias = array();
		foreach ($data['temas'] as $key => $value) {
			$clase_materia = $this->formateaMateria($value->materia);
			$clases_materias[$key] = 'icon-ts-icon-filled-'.$clase_materia;
		}
		$data['clases_iconos'] = $clases_materias;


		$data['seccion'] = 'Temas';

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('temas', $data);
		$this->load->view('footer', $data);
	} // index

	/**
	 * Descripción: Muestra trámites/servicios por tema
	 * @param integer $idTema
	 * @return 
	 */
	function muestraTS($idTema)
	{
		// Datos de conexión para WS
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Carga todos los trámites y servicios por tema
		$ts_tema = file_get_contents($url_ws.'/ts_tema/id/'.$idTema.'/format/json');
		if(is_null($ts_tema))
			$data['ts_tema'] = '';
		else
			$data['ts_tema'] = json_decode($ts_tema);

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

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('ts_tema', $data);
		$this->load->view('footer', $data);
	}

	/**
	 * Descripción: Borra acentos de materias para 
	 * armar el nombre del icono
	 * @param string $str
	 * @return string $materia_formateada
	 */
	private function formateaMateria($str) {
		$str = trim($str);
		$a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','Ā','ā','Ă','ă','Ą','ą','Ć','ć','Ĉ','ĉ','Ċ','ċ','Č','č','Ď','ď','Đ','đ','Ē','ē','Ĕ','ĕ','Ė','ė','Ę','ę','Ě','ě','Ĝ','ĝ','Ğ','ğ','Ġ','ġ','Ģ','ģ','Ĥ','ĥ','Ħ','ħ','Ĩ','ĩ','Ī','ī','Ĭ','ĭ','Į','į','İ','ı','Ĳ','ĳ','Ĵ','ĵ','Ķ','ķ','Ĺ','ĺ','Ļ','ļ','Ľ','ľ','Ŀ','ŀ','Ł','ł','Ń','ń','Ņ','ņ','Ň','ň','ŉ','Ō','ō','Ŏ','ŏ','Ő','ő','Œ','œ','Ŕ','ŕ','Ŗ','ŗ','Ř','ř','Ś','ś','Ŝ','ŝ','Ş','ş','Š','š','Ţ','ţ','Ť','ť','Ŧ','ŧ','Ũ','ũ','Ū','ū','Ŭ','ŭ','Ů','ů','Ű','ű','Ų','ų','Ŵ','ŵ','Ŷ','ŷ','Ÿ','Ź','ź','Ż','ż','Ž','ž','ſ','ƒ','Ơ','ơ','Ư','ư','Ǎ','ǎ','Ǐ','ǐ','Ǒ','ǒ','Ǔ','ǔ','Ǖ','ǖ','Ǘ','ǘ','Ǚ','ǚ','Ǜ','ǜ','Ǻ','ǻ','Ǽ','ǽ','Ǿ','ǿ','Ά','ά','Έ','έ','Ό','ό','Ώ','ώ','Ί','ί','ϊ','ΐ','Ύ','ύ','ϋ','ΰ','Ή','ή');
	  $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o','Α','α','Ε','ε','Ο','ο','Ω','ω','Ι','ι','ι','ι','Υ','υ','υ','υ','Η','η');
	  $materia_formateada = strtolower(str_replace($a,$b,$str));
	  $materia_formateada = str_replace(',', '', $materia_formateada);
	  return str_replace(' ','-',$materia_formateada);
	}// formateaMateria

}