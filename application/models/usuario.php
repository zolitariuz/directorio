<?php
class Usuario extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function valida_usuario($usuario, $password){
		$condiciones = array('usuario' => $usuario, 'password' => $password);
		$query = $this->db->get_where('usuarios', $condiciones);
		$usuario = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
			    $usuario = array(
			    	'id_usuario' 	=> $row->id_usuario,
			    	'usuario' 		=> $row->usuario,
			    	'nombre' 		=> $row->nombre,
			    	'apellidos'	  	=> $row->apellidos,
			    	'password'	 	=> $row->password,
			    	'is_admin'		=> $row->is_admin
			    	);
			}
			return $usuario;
		} else
			return 0;
	}// validaUsuario

	public function dame_usuario($id){
		$condiciones = array('id_usuario' => $id);
		$query = $this->db->get_where('usuarios', $condiciones);
		$usuario = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
			    $usuario = array(
			    	'id_usuario' 	=> $row->id_usuario,
			    	'usuario' 		=> $row->usuario,
			    	'nombre' 		=> $row->nombre,
			    	'apellidos'	  	=> $row->apellidos,
			    	'password'	 	=> $row->password,
			    	'is_admin'		=> $row->is_admin
			    	);
			}
			return $usuario;
		} else
			return 0;
	}// validaUsuario

	
		
}// clase Usuario