<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info_tramite extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('info_ts');
	}

	function index()
	{
		/*$tomando = $this->info_ts->getInfoTramites();
		print_r($tomando);
		//echo '<h2>Andamos '.$tomando.'</h2>';*/

		$data['info'] = json_decode(
		    file_get_contents('http://admin_ts:@dm1n_TS_123@localhost:8888/tramites_servicios/index.php/api/info_tramites/format/json')
		);
		 
		$this->load->view('info_tramite', $data);
	}
}