<?php
class Info_ts extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getInfoTramite($id){
		$query = $this->db->get_where('v_info_ts', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $row)
		{
		    $res = array(
		    	'id_cat_tramite_servicio' 	=> $row->id_cat_tramite_servicio,
		    	'nombre_tramite' 		=> $row->nombre_tramite,
		    	'id_tramite_servicio' 	=> $row->id_tramite_servicio,
		    	'descripcion_ts' 	=> $row->descripcion_ts,
		    	'ente'	 	=> $row->ente,
		    	'tiempo_respuesta'	 	=> $row->tiempo_respuesta,
		    	'beneficiario'	 	=> $row->beneficiario,
		    	'requisito'	 	=> $row->requisito,
		    	'requisito_especifico'	 	=> $row->requisito_especifico,
		    	'formato'	 	=> $row->formato,
		    	);
		}
		return $res;
	}
	public function getInfoTramites(){
		$query = $this->db->get_where('v_info_ts');
		$res = array();
		$i = 0;

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio'	=> $row->id_tramite_servicio,
		    	'ts_descripcion' 		=> $row->ts_descripcion,
		    	'cat_ts_descripcion' 	=> $row->cat_ts_descripcion,
		    	'materia_descripcion' 	=> $row->materia_descripcion,
		    	'ente_descripcion'	 	=> $row->ente_descripcion,
		    	);
		}
		return $res;
	}
}