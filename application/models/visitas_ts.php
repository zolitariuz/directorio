<?php
class Visitas_ts extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}	

	/**
	 * Descripción: Aumenta # de visitas a trámite o servicio
	 * @param integer $id_tramite_servicio, date $fecha
	 * @return 
	 */
	public function agrega_num_visita($id_tramite_servicio, $fecha){
		// Si el trámite/servicios no existe, agregar entrada
		// de lo contrario sumar al contador
		$visitas = $this->existeVisitaMes($id_tramite_servicio, $fecha);
		if($visitas){
			$num_visitas = $visitas['num_visitas'] + 1;

			$data = array(
			   'id_visitas_ts' 	=> 	$visitas['id_visitas_ts'],
			   'num_visitas'	=> 	$num_visitas,
			   'fecha'			=> 	$fecha 
			);

			// actualizar registro
			$this->db->where('id_visitas_ts', $visitas['id_visitas_ts']);
			$this->db->update('visitas_ts', $data);
		} else {
			$data = array(
			   'id_tramite_servicio'	=> $id_tramite_servicio,
			   'fecha' 					=> $fecha,
			   'num_visitas'			=> 1
			);

			$this->db->insert('visitas_ts', $data);
		}
	}// agrega_num_visita

	/**
	 * Descripción: Revisa si existe registro de trámite/servicio 
	 * en el mes actual.
	 * @param integer $id_tramite_servicio, date $fecha
	 * @return mixed $visitas
	 */
	public function existeVisitaMes($id_tramite_servicio, $fecha){
		$visitas = 0;
		// Parte la fecha para obtener mes y año
		$fecha_ar = explode('-', $fecha);
		$fecha_inicial = date($fecha_ar[0].'-'.$fecha_ar[1].'-01');
		$fecha_final = date($fecha_ar[0].'-'.$fecha_ar[1].'-t');

		// ¿Existen visitas en el mes?
		$this->db->select('id_visitas_ts, num_visitas');
		$this->db->where('"fecha" BETWEEN \''.$fecha_inicial.'\' AND \''.$fecha_final.'\'');
		$this->db->where('id_tramite_servicio', $id_tramite_servicio);
		$condiciones = array('id_tramite_servicio' => $id_tramite_servicio);
		$query = $this->db->get('visitas_ts');

		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
			    $visitas = array(
			    	'id_visitas_ts' => $row->id_visitas_ts,
			    	'num_visitas'	=> $row->num_visitas
			    	);
			}
		}
		return $visitas;
	}// existeVisitaMes
		
}// clase Visitas_ts