<?php
class Aviso extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->actualizaStatus();
	}

	/**
	 * Descripción: Agrega un aviso a la base de datos
	 * @param string $aviso, string $tipo, integer $id_usuario, 
	 * date $fecha_inicial, date $fecha_inicial, string $activo, 
	 * @return true	o false 
	 */
	public function agrega_aviso($aviso, $url, $tipo, $id_usuario, $fecha_inicial, $fecha_final, $activo){
		$data = array(
		   'id_usuario' 	=> $id_usuario,
		   'contenido' 		=> $aviso,
		   'tipo_contenido' => $tipo,
		   'url' 			=> $url,
		   'fecha_inicial'	=> $fecha_inicial,
		   'fecha_final'	=> $fecha_final,
		   'is_activo'		=> $activo,
		   'is_default'		=> 'f'
		);

		if($this->db->insert('avisos', $data)){
			return 1;
		} else {
			return 0;
		} 
	} // agrega_aviso

	/**
	 * Descripción: Actualiza un aviso de la base de datos
	 * @param integer $id_aviso, string $aviso, string $url, string $tipo
	 * @return true	
	 */
	public function actualiza_aviso($id_aviso, $aviso, $url, $tipo, $fecha_inicial, $fecha_final, $activo){
		$data = array(
		   'contenido' 		=> 	$aviso,
		   'tipo_contenido' => 	$tipo,
		   'fecha_inicial'   =>	$fecha_inicial,
		   'fecha_final'   	=>	$fecha_final,
		   'url' 			=> 	$url, 
		   'is_activo' 		=> 	$activo
		);

		// actualizar registro
		$this->db->where('id_aviso', $id_aviso);
		$this->db->update('avisos', $data);

		return 1;
	} // actualiza_aviso

	/**
	 * Descripción: Eliminar un aviso de la base de datos
	 * @param integer $id_aviso
	 * @return nada	
	 */
	public function elimina_aviso($id_aviso){
		$this->db->where('id_aviso', $id_aviso);
		$this->db->delete('avisos', $data);
	} // elimina_aviso

	public function dame_avisos(){
		$query = $this->db->get('avisos');
		$avisos = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $avisos[$key] = array(
			    	'id_aviso' 			=> $row->id_aviso,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'tipo_contenido' 	=> $row->tipo_contenido,
			    	'contenido' 		=> $row->contenido,
			    	'url'	  			=> $row->url,
			    	'fecha_inicial'		=> $row->fecha_inicial,
			    	'fecha_final'		=> $row->fecha_final,
			    	'activo'			=> $row->is_activo,
			    	'is_default'		=> $row->is_default
			    	);
			}
			return $avisos;
		} else
			return 0;
	}// dame_avisos

	public function dame_avisos_activos(){
		$this->db->where("(fecha_inicial <= DATE 'today' AND fecha_final >= DATE 'today' AND is_activo = 't') OR is_default = 't'");
		$query = $this->db->get('avisos');
		$avisos = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $avisos[$key] = array(
			    	'id_aviso' 			=> $row->id_aviso,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'tipo_contenido' 	=> $row->tipo_contenido,
			    	'contenido' 		=> $row->contenido,
			    	'url'	  			=> $row->url,
			    	'fecha_inicial'		=> $row->fecha_inicial,
			    	'fecha_final'		=> $row->fecha_final,
			    	'activo'			=> $row->is_activo,
			    	'is_default'		=> $row->is_default
			    	);
			}
			return $avisos;
		} else
			return 0;
	}// dame_avisos_activos

	/**
	 * Descripción: Jala un aviso de base de datos
	 * @param integer $id
	 * @return array $aviso 	
	 */
	public function dame_aviso($id){
		$query = $this->db->get_where('avisos', array('id_aviso' => $id));
		$aviso = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
			    $aviso = array(
			    	'id_aviso' 			=> $row->id_aviso,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'tipo_contenido' 	=> $row->tipo_contenido,
			    	'contenido' 		=> $row->contenido,
			    	'url'	  			=> $row->url,
			    	'fecha_inicial'		=> $row->fecha_inicial,
			    	'fecha_final'		=> $row->fecha_final,
			    	'activo'			=> $row->is_activo,
			    	'is_default'		=> $row->is_default
			    	);
			}
			return $aviso;
		} else
			return 0;
	}// dame_aviso

	/**
	 * Descripción: Revisa la vigencia y desactiva avisos caducados
	 * @param 
	 * @return 
	 */
	private function actualizaStatus(){
		$data = array('is_activo' => 't');
		$this->db->where("is_activo <> 'f'");
		$this->db->update('avisos', $data);


		// actualizar registro
		$data = array('is_activo' => 'f');
		$this->db->where("fecha_final < DATE 'today' AND is_activo = 't' AND is_default <> 't'");
		$this->db->update('avisos', $data);
	}
		
}// clase Usuario