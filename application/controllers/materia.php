<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materia extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('consulta_materia');
	}

	function index()
	{
		/*$data['info'] = json_decode(
		    file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/codeigniter-restserver/index.php/api/consulta_materia/format/json')
		);*/
		 
		//$this->load->view('info_tramite', $data);
		$data = $this->consulta_materia->getTramiteServicioMateria(1);
		var_dump($data);
	}
}