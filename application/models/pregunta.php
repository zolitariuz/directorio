<?php
class Pregunta extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

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

	public function dame_preguntas(){
		$query = $this->db->get('preguntas');
		$anuncios = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $anuncios[$key] = array(
			    	'id_pregunta' 		=> $row->id_pregunta,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'pregunta' 			=> $row->pregunta,
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
			    	'id_pregunta' 			=> $row->id_pregunta,
			    	'pregunta'	  			=> $row->pregunta,
			    	);
			}
			return $pregunta;
		} else
			return 0;
	}// dame_pregunta
		
}// clase Pregunta