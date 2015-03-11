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
		$temas = file_get_contents($url_ws.'/temas/format/json');
		if(is_null($temas))
			$data['temas'] = '';
		else
			$data['temas'] = json_decode($temas);

		// Clase para el ícono de la materia
		$clases_materias = array();
		foreach ($data['temas'] as $key => $value) {
			$clase_materia = $this->formateaMateria($value->materia);
			$clases_materias[$key] = 'icon-ts-'.$clase_materia;
		}
		$data['clases_iconos'] = $clases_materias;


		$data['seccion'] = 'Inicio';

		// Cargar vista de inicio con header y footer
		$this->load->view('header', $data);
		$this->load->view('inicio', $data);
		$this->load->view('footer', $data);
	} // index

	/**
	 * Descripción: Link para mostrar la gaceta
	 */
	function consulta_gaceta() {
		// Variable de conexión a web services
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		// Carga nombre y id de todos los trámites y servicios
		// para la función de autocompletar
		$nombres_ts =  file_get_contents($url_ws.'/nombres_ts/format/json');
		if(is_null($nombres_ts))
			$data['nombres_ts'] = '';
		else
			$data['nombres_ts'] = $nombres_ts;

		$data['seccion'] = 'Consulta Gaceta';

		$this->load->view('header', $data);
		$this->load->view('consulta_gaceta', $data);
		$this->load->view('footer', $data);
	}// consulta_gaceta

	/**
	 * Descripción: Link para mostrar la gaceta
	 */
	function busqueda() {
		$this->load->helper('url');
		// Variable de conexión a web services
		$url_ws = 'http://'.USUARIO_WS.':'.PASSWORD_WS.'@'.URL_WS;

		$palabra_clave = $_POST['search_term'];

		// Carga nombre y id de todos los trámites y servicios
		// para la función de autocompletar
		$nombres_ts =  file_get_contents($url_ws.'/nombres_ts/format/json');
		if(is_null($nombres_ts))
			$data['nombres_ts'] = '';
		else
			$data['nombres_ts'] = $nombres_ts;

		//$data['palabra_clave'] = strtolower(urldecode($palabra_clave));
		$data['palabra_clave'] = strtolower($this->reemplazarAcentosEsp($palabra_clave));

		// Obtener nombres de trámites y servicios via WS
		$busqueda =  file_get_contents($url_ws.'/buscar/term/'.$data['palabra_clave'].'/format/json');
		if(is_null($busqueda))
			$data['resultados'] = '';
		else
			$data['resultados'] = json_decode($busqueda);

		if(count($data['resultados']) == 1) redirect('/tramites_servicios/muestraInfo/'.$data['resultados'][0]->id_tramite_servicio);

		$data['num_resultados'] = count($data['resultados']);
		$data['palabra_clave'] = urldecode($palabra_clave);

		$data['seccion'] = 'Búsqueda';

		$this->load->view('header', $data);
		$this->load->view('busqueda', $data);
		$this->load->view('footer', $data);
	}// busqueda

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

	/**
	 * Descripción: Borra acentos de materias para
	 * armar el nombre del icono
	 * @param string $str
	 * @return string 
	 */
	private function reemplazarAcentosEsp($str) {
		$str = trim($str);

		$a = array('Á','É','Í','Ó','Ú','á','é','í','ó','ú');
	  	$b = array('_A_','_E_','_I_','_O_','_U_','_a_','_e_','_i_','_o_','_u_');
	  	return str_replace($a,$b,$str);
	}// formateaMateria

	

}// class Inicio