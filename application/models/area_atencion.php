<?php
class Area_atencion extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getAreaAtencion($id){
		$query = $this->db->get_where('v_areas_atencion', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio' 	=> $row->id_tramite_servicio,
		    	'nombre' 				=> $row->nombre,
		    	'calle_numero' 			=> $row->calle_numero,
		    	'delegacion' 			=> $row->delegacion,
		    	'colonia' 				=> $row->colonia,
		    	'cp' 					=> $row->cp,
		    	'telefonos' 			=> $row->telefonos,
		    	'url_ubicacion'			=> $row->url_ubicacion,
		    	);
		}
		return $res;
	}
}