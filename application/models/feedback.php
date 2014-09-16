<?php
class Feedback extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * Descripción: Agrega feedback sobre un trámite/servicio
	 * @param string $id_tramite_servicio, string $comentarios, 
	 *int $calificacion, string $ayuda
	 * @return true	o false
	 */
	public function agrega_feedback($id_tramite_servicio, $comentarios, $calificacion, $ayuda){
		$data = array(
		   'id_tramite_servicio' 	=> $id_tramite_servicio,
		   'comentarios' 			=> $comentarios,
		   'calificacion' 			=> 	$calificacion,
		   'ayuda' 					=> 	$ayuda
		);

		if($this->db->insert('feedback_ts', $data)){
			return 1;
		} else {
			return 0;
		} 
	} // agrega_feedback

	/**
	 * Descripción: Regresa el feedback de un trámite/servicio
	 * @param integer $id_tramite_servicio
	 * @return mixed $feedback
	 */
	public function dame_feedback($id_tramite_servicio){
		$query = $this->db->get_where('feedback_ts', array('id_tramite_servicio' => $id_tramite_servicio));
		$feedback = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key => $row)
			{
			    $feedback[$key] = array(
			    	'id_tramite_servicio'	=> $row->id_tramite_servicio,
			    	'comentarios' 			=> $row->comentarios,
			    	'calificacion' 			=> $row->calificacion,
			    	'ayuda' 				=> $row->ayuda,
			    	);
			}
			return $feedback;
		} else
			return 0;
	}// dame_feedback

}// clase Feedback