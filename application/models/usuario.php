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
	}// valida_usuario

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
	}// dame_usuario

	public function agrega_usuario($usuario, $password, $nombre, $apellidos, $is_admin){
		$data = array(
		   'usuario' 	=> $usuario,
		   'nombre' 	=> $nombre,
		   'apellidos' 	=> $apellidos,
		   'password' 	=> $password,
		   'is_admin' 	=> $is_admin
		);
		
		if($this->db->insert('usuarios', $data))
			return 1;
		else
			return 0;

	}// agrega_usuario

	public function agrega_pregunta($pregunta, $id_usuario){
		$data = array(
		   'id_usuario' 	=> $id_usuario,
		   'pregunta' 		=> $pregunta
		);

		if($this->db->insert('preguntas', $data)){
			return 1;
		} else {
			return 0;
		} 
	}// agregar_pregunta

	
		
}// clase Usuario