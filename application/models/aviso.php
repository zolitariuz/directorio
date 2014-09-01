<?php
class Aviso extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function agrega_aviso($aviso, $url, $tipo, $id_usuario){
		$data = array(
		   'id_usuario' => 		$id_usuario,
		   'contenido' => 		$aviso,
		   'tipo_contenido' => 	$tipo,
		   'url' => 			$url
		);

		if($this->db->insert('avisos', $data)){
			return 1;
		} else {
			return 0;
		} 
	} // agrega_aviso

	public function actualiza_aviso($id_aviso, $aviso, $url, $tipo){
		$data = array(
		   'contenido' => 		$aviso,
		   'tipo_contenido' => 	$tipo,
		   'url' => 			$url
		);

		// actualizar registro
		$this->db->where('id_aviso', $id_aviso);
		$this->db->update('avisos', $data);

		return 1;
	} // actualiza_aviso


	public function dame_avisos(){
		$query = $this->db->get('avisos');
		$avisos = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $avisos[$key] = array(
			    	'id_aviso' 			=> $row->id_aviso,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'tipo_contenido' 	=> $row->tipo_contenido,
			    	'contenido' 		=> $row->contenido,
			    	'url'	  			=> $row->url,
			    	);
			}
			return $avisos;
		} else
			return 0;
	}// dame_avisos

	/**
	 * Descripción: Jala un aviso de base de datos
	 * @param integer $id
	 * @return array $aviso 	
	 */
	public function dame_aviso($id){
		$query = $this->db->get_where('avisos', array('id_aviso' => $id));
		$aviso = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
			    $aviso = array(
			    	'id_aviso' 			=> $row->id_aviso,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'tipo_contenido' 	=> $row->tipo_contenido,
			    	'contenido' 		=> $row->contenido,
			    	'url'	  			=> $row->url,
			    	);
			}
			return $aviso;
		} else
			return 0;
	}// dame_aviso
		
}// clase Usuario