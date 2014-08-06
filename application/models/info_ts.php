<?php
class Info_ts extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getInfoTramite($id){
		$query = $this->db->get_where('v_info_ts', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_cat_tramite_servicio' 	=> $row->id_cat_tramite_servicio,
		    	'nombre_tramite' 			=> $row->nombre_tramite,
		    	'id_tramite_servicio' 		=> $row->id_tramite_servicio,
		    	'descripcion_ts' 			=> $row->descripcion_ts,
		    	'ente'	 					=> $row->ente,
		    	'tiempo_respuesta'	 		=> $row->tiempo_respuesta,
		    	'beneficiario'	 			=> $row->beneficiario,
		    	);
		}
		return $res;
	}

	public function getRequisitos($id){
		$query = $this->db->get_where('v_requisito_ts', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio' 	=> $row->id_tramite_servicio,
		    	'requisito'	 	=> $row->requisito,
		    	);
		}
		return $res;
	}
}