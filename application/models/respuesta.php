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
		
}// clase Anuncio