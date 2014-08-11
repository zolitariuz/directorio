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
		    $res = array(
		    	'id_cat_tramite_servicio' 	=> $row->id_cat_tramite_servicio,
		    	'nombre_tramite' 			=> $row->nombre_tramite,
		    	'id_tramite_servicio' 		=> $row->id_tramite_servicio,
		    	'descripcion_ts' 			=> $row->descripcion_ts,
		    	'ente'	 					=> $row->ente,
		    	'tiempo_respuesta'	 		=> $row->tiempo_respuesta,
		    	'beneficiario'	 			=> $row->beneficiario,
		    	'materia'					=> $row->materia,
		    	'tramite_servicio'    		=> $row->tramite_servicio
		    	);
		}
		return $res;
	}

	public function getTramitesServicios($tramiteOServicio){
		$this->db->select('*');
		$this->db->from('v_info_ts');
		$tipoTS = array($tramiteOServicio, '3');
		$this->db->where_in('tramite_servicio', $tipoTS);
		$this->db->limit(10);
		$this->db->order_by('tramite_servicio', 'asc');
		$query = $this->db->get();

		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_cat_tramite_servicio' 	=> $row->id_cat_tramite_servicio,
		    	'nombre_ts' 				=> $row->nombre_tramite,
		    	'id_tramite_servicio' 		=> $row->id_tramite_servicio,
		    	'tramite_servicio'    		=> $row->tramite_servicio
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
		    	'id_requisito_ts'	 		=> $row->id_requisito_ts,
		    	'id_cat_requisito' 			=> $row->id_cat_requisito,
		    	'id_tramite_servicio'	 	=> $row->id_tramite_servicio,
		    	'documento_oficial' 		=> $row->documento_oficial,
		    	'documento_acreditacion' 	=> $row->documento_acreditacion,
		    	);
		}
		return $res;
	}

	public function getRequisitosEsp($id){
		$query = $this->db->get_where('v_requisito_esp_ts', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_requisito_especifico_ts'	=> $row->id_requisito_especifico_ts,
		    	'requisito_especifico' 			=> $row->requisito_especifico,
		    	'id_tramite_servicio'	 		=> $row->id_tramite_servicio,
		    	);
		}
		return $res;
	}
}