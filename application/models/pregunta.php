<?php
class Pregunta extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->actualizaStatus();
	}

	/**
	 * Descripción: Agrega pregunta a la base de datos
	 * @param string $pregunta, integer $id_usuario, date $fecha_inicial, 
	 * date $fecha_final, char $activo
	 * @return boolean
	 */
	public function agrega_pregunta($pregunta, $id_usuario, $fecha_inicial, $fecha_final, $activo){
		$data = array(
		   'id_usuario' 	=> $id_usuario,
		   'pregunta' 		=> $pregunta,
		   'fecha_inicial'	=> $fecha_inicial,
		   'fecha_final'	=> $fecha_final,
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
	 * @return 	
	 */
	public function elimina_pregunta($id_pregunta){
		$this->db->where('id_pregunta', $id_pregunta);
		$this->db->delete('preguntas', $data);
	} // elimina_pregunta

	/**
	 * Descripción: Regresa todas las preguntas
	 * @param 
	 * @return mixed array $preguntas	
	 */
	public function dame_preguntas(){
		$query = $this->db->get('preguntas');
		$preguntas = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $preguntas[$key] = array(
			    	'id_pregunta'	=> $row->id_pregunta,
			    	'id_usuario'	=> $row->id_usuario,
			    	'pregunta' 		=> $row->pregunta,
			    	'fecha_inicial'	=> $row->fecha_inicial,
			    	'fecha_final'	=> $row->fecha_final,
			    	'activo'		=> $row->is_activo
			    	);
			}
			return $preguntas;
		} else
			return 0;
	}// dame_preguntas

	/**
	 * Descripción: Regresa todas las preguntas activas
	 * @param 
	 * @return mixed array $preguntas	
	 */
	public function dame_preguntas_activas(){
		$query = $this->db->get('preguntas');
		$preguntas = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $preguntas[$key] = array(
			    	'id_pregunta'	=> $row->id_pregunta,
			    	'id_usuario'	=> $row->id_usuario,
			    	'pregunta' 		=> $row->pregunta,
			    	'fecha_inicial'	=> $row->fecha_inicial,
			    	'fecha_final'	=> $row->fecha_final,
			    	'activo'		=> $row->is_activo
			    	);
			}
			return $preguntas;
		} else
			return 0;
	}// dame_preguntas_activas

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
			    	'fecha_inicial'	=> $row->fecha_inicial,
			    	'fecha_final'	=> $row->fecha_final,
			    	'activo'		=> $row->is_activo
			    	);
			}
			return $pregunta;
		} else
			return 0;
	}// dame_pregunta

	/**
	 * Descripción: Jala la última pregunta de base de datos
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
	public function actualiza_pregunta($id_pregunta, $pregunta, $fecha_inicial,  $fecha_final, $activo){
		$data = array(
		   'pregunta' 		=> 	$pregunta,
		   'fecha_inicial'	=> 	$fecha_inicial,
		   'fecha_final'	=> 	$fecha_final,
		   'is_activo' 		=> 	$activo
		);

		// actualizar registro
		$this->db->where('id_pregunta', $id_pregunta);
		$this->db->update('preguntas', $data);
		$this->actualizaStatus();

		return 1;
	} // actualiza_aviso

	/**
	 * Descripción: Revisa la vigencia y desactiva avisos caducados
	 * @param 
	 * @return 
	 */
	private function actualizaStatus(){
		$data = array('is_activo' => 't');
		$this->db->where("is_activo <> 'f'");
		$this->db->update('preguntas', $data);

		// actualizar registro
		$data = array('is_activo' => 'f');
		$this->db->where("fecha_final < DATE 'today' AND is_activo = 't'");
		$this->db->update('preguntas', $data);
	}
		
}// clase Pregunta