<?php
class Ts_comun extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}	

	/**
	 * Descripción: Regresa el total de trámites y servicios comunes
	 * @param 
	 * @return integer
	 */
	public function total_ts_comunes(){
		return $this->db->count_all_results('ts_comunes');
	}// total_ts_comunes

	/**
	 * Descripción: Agrega un ts_comun a la base de datos
	 * @param string $id_ts_comun, string $url, string $tipo, integer $id_usuario
	 * @return true	o false
	 */
	public function agrega_ts_comun($id_tramite_servicio, $is_comun){
		$data = array(
		   'id_tramite_servicio'	=> $id_tramite_servicio,
		   'is_comun' 				=> $is_comun
		);

		if($this->db->insert('ts_comunes', $data)){
			return 1;
		} else {
			return 0;
		} 
	} // agrega_ts_comun

	/**
	 * Descripción: Obtener los trámites/servicios mas comunes
	 * @param 
	 * @return array $ts_comunes
	 */
	public function dame_ts_comunes(){
		//$ayer = date('d.m.Y',strtotime("-1 days"));
		$query = $this->db->get('ts_comunes');
		$ts_comunes = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $ts_comunes[$key] = array(
			    	'id_tramite_servicio'	=> $row->id_tramite_servicio
			    	);
			}
			return $ts_comunes;
		} else
			return 0;
	} // dame_ts_comunes
		
}// clase Ts_comun