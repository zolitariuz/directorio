<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Carga modelo con info de trámites
		$this->load->model('info_ts');
	}

	function index()
	{
		// carga estilos y js
		$data['css'] = $this->config->item('css');
		$data['js'] = $this->config->item('js');

		$data['ts'] = json_decode(
		    file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/info_tramite/id/43/format/json')
		);
		$data['requisitos'] = json_decode(
		    file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/requisitos/id/43/format/json')
		);

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('tramite', $data);
		$this->load->view('footer', $data);
	}

	function muestraTramite($idTramite){
		// carga estilos y js
		$data['css'] = $this->config->item('css');
		$data['js'] = $this->config->item('js');

		// Carga info de un trámite y regresa JSON
		$data['info'] = json_decode(
		    file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/directorio/index.php/api/info_tramite/id/'.$idTramite.'/format/json')
		);

		// Cargar vista inicio
		$this->load->view('header', $data);
		$this->load->view('tramite', $data);
		$this->load->view('footer', $data);
	}


}