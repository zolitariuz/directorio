<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{	 
		$data['css'] = $this->config->item('css');
		$data['js'] = $this->config->item('js');
		$this->load->view('header', $data);
		$this->load->view('inicio');
		$this->load->view('footer', $data);
	}

	function hola(){
		echo 'tamos tomando';
	}
}