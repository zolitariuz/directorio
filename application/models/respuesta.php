<?php
class Respuesta extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * Descripción: Agrega un respuesta a la base de datos
	 * @param string $id_respuesta, string $id_pregunta, string $respuesta, string $hora
	 * @return true	o false
	 */
	public function agrega_respuesta($id_pregunta, $respuesta, $hora){
		$data = array(
		   'id_pregunta' 	=> $id_pregunta,
		   'respuesta' 		=> $respuesta,
		   'hora' 			=> 	$hora
		);

		if($this->db->insert('respuestas', $data)){
			return 1;
		} else {
			return 0;
		} 
	} // agrega_respuesta

	/**
	 * Descripción: Regresa total de respuestas de una pregunta
	 * @param string $id_pregunta
	 * @return integer
	 */
	public function dame_respuestas($id_pregunta){
		$query = $this->db->get_where('respuestas', array('id_pregunta' => $id_pregunta));
		$respuestas = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key => $row)
			{
			    $respuestas[$key] = array(
			    	'id_respuesta' 	=> $row->id_respuesta,
			    	'id_pregunta' 	=> $row->id_pregunta,
			    	'respuesta' 	=> $row->respuesta,
			    	'hora' 			=> $row->hora
			    	);
			}
			return $respuestas;
		} else
			return 0;
	} // dame_num_respuestas
		
}// clase Anuncio