<?php
class Pregunta extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function agrega_pregunta($pregunta, $id_usuario, $vigencia, $activo){
		$data = array(
		   'id_usuario' 	=> $id_usuario,
		   'pregunta' 		=> $pregunta,
		   'vigencia'		=> $vigencia,
		   'is_activo'		=> $activo
		);

		if($this->db->insert('preguntas', $data)){
			return 1;
		} else {
			return 0;
		} 
	}// agregar_pregunta

	/**
	 * Descripción: Eliminar una pregunta de la base de datos
	 * @param integer $id_pregunta
	 * @return nada	
	 */
	public function elimina_pregunta($id_pregunta){
		$this->db->where('id_pregunta', $id_pregunta);
		$this->db->delete('preguntas', $data);
	} // elimina_pregunta

	public function dame_preguntas(){
		$this->db->where("vigencia > DATE 'yesterday'");
		$query = $this->db->get('preguntas');
		$anuncios = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $anuncios[$key] = array(
			    	'id_pregunta'	=> $row->id_pregunta,
			    	'id_usuario'	=> $row->id_usuario,
			    	'pregunta' 		=> $row->pregunta,
			    	'vigencia'		=> $row->vigencia,
			    	'activo'		=> $row->is_activo
			    	);
			}
			return $anuncios;
		} else
			return 0;
	}// dame_preguntas

	/**
	 * Descripción: Jala una pregunta de base de datos
	 * @param integer $id
	 * @return array $pregunta 	
	 */
	public function dame_pregunta($id){
		$query = $this->db->get_where('preguntas', array('id_pregunta' => $id));
		$pregunta = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
			    $pregunta = array(
			    	'id_pregunta'	=> $row->id_pregunta,
			    	'pregunta'	  	=> $row->pregunta,
			    	'vigencia'		=> $row->vigencia,
			    	'activo'		=> $row->is_activo
			    	);
			}
			return $pregunta;
		} else
			return 0;
	}// dame_pregunta

	/**
	 * Descripción: Jala una pregunta de base de datos
	 * @param integer $id
	 * @return array $pregunta 	
	 */
	public function dame_ultima_pregunta(){
		$this->db->order_by("id_pregunta", "desc"); 
		$this->db->limit(1);
		$query = $this->db->get_where('preguntas', array('is_activo' => 't'));
		$pregunta = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
			    $pregunta = array(
			    	'id_pregunta' 			=> $row->id_pregunta,
			    	'pregunta'	  			=> $row->pregunta,
			    	);
			}
			return $pregunta;
		} else
			return 0;
	}// dame_pregunta

	/**
	 * Descripción: Actualiza una pregunta de la base de datos
	 * @param integer $id_aviso, string $aviso, string $url, string $tipo
	 * @return true	
	 */
	public function actualiza_pregunta($id_pregunta, $pregunta, $vigencia, $activo){
		$data = array(
		   'pregunta' 	=> 	$pregunta,
		   'vigencia'	=> 	$vigencia,
		   'is_activo' 	=> 	$activo
		);

		// actualizar registro
		$this->db->where('id_pregunta', $id_pregunta);
		$this->db->update('preguntas', $data);

		return 1;
	} // actualiza_aviso
		
}// clase Pregunta