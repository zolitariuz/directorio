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

	public function dame_usuarios(){
		$this->db->order_by('id_usuario');
		$query = $this->db->get('usuarios');
		$usuario = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key => $row)
			{
			    $usuarios[$key] = array(
			    	'id_usuario' 	=> $row->id_usuario,
			    	'usuario' 		=> $row->usuario,
			    	'nombre' 		=> $row->nombre,
			    	'apellidos'	  	=> $row->apellidos,
			    	'password'	 	=> $row->password,
			    	'is_admin'		=> $row->is_admin
			    	);
			}
			return $usuarios;
		} else
			return 0;
	}// dame_usuarios

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

	public function edita_usuario($id_usuario, $usuario, $password, $nombre, $apellidos, $is_admin){
		$data = array(
		   'usuario' 	=> $usuario,
		   'nombre' 	=> $nombre,
		   'apellidos' 	=> $apellidos,
		   'password' 	=> $password,
		   'is_admin' 	=> $is_admin
		);
		
		$this->db->where('id_usuario', $id_usuario);
		if($this->db->update('usuarios', $data))
			return 1;
		else
			return 0;

	}// edita_usuario

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

	/**
	 * Descripción: Revisa si ya existe el usuario en la base de datos.
	 * @param string $id_ts_comun, string $url, string $tipo, integer $id_usuario
	 * @return true	o false
	 */
	public function existe($usuario){
		$this->db->where('usuario', $usuario);
		$query = $this->db->get('usuarios');

		if($query->num_rows() > 0) return true;

		return false;
	} // agrega_ts_comun	
		
}// clase Usuario