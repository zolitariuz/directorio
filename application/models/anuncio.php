<?php
class Anuncio extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function agrega_anuncio($anuncio, $id_usuario, $tipo_contenido, $url, $url_img, $vigencia, $activo){
		$data = array(
		   'id_usuario' 		=> $id_usuario,
		   'tipo_contenido' 	=> $tipo_contenido,
		   'contenido' 			=> $anuncio,
		   'url' 				=> $url,
		   'url_img' 			=> $url_img,
		   'vigencia'			=> $vigencia,
		   'is_activo'			=> $activo
		);

		if($this->db->insert('anuncios', $data)){
			return 1;
		} else {
			return 0;
		} 
	}

	/**
	 * Descripción: Eliminar un anuncio de la base de datos
	 * @param integer $id_anuncio
	 * @return nada	
	 */
	public function elimina_anuncio($id_anuncio){
		$this->db->where('id_anuncio', $id_anuncio);
		$this->db->delete('anuncios', $data);
	} // elimina_anuncio

	public function dame_anuncios(){
		$query = $this->db->get('anuncios');
		$anuncios = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $anuncios[$key] = array(
			    	'id_anuncio' 		=> $row->id_anuncio,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'tipo_contenido'	=> $row->tipo_contenido,
			    	'contenido' 		=> $row->contenido,
			    	'url'	  			=> $row->url,
			    	'url_img'	 		=> $row->url_img,
			    	'vigencia'			=> $row->vigencia,
			    	'activo'			=> $row->is_activo
			    	);
			}
			return $anuncios;
		} else
			return 0;
	}// dame_anuncios

	public function dame_anuncios_activos(){
		$this->db->where("vigencia > DATE 'yesterday' AND is_activo = 't'");
		$query = $this->db->get('anuncios');
		$anuncios = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $anuncios[$key] = array(
			    	'id_anuncio' 		=> $row->id_anuncio,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'tipo_contenido'	=> $row->tipo_contenido,
			    	'contenido' 		=> $row->contenido,
			    	'url'	  			=> $row->url,
			    	'url_img'	 		=> $row->url_img,
			    	'vigencia'			=> $row->vigencia,
			    	'activo'			=> $row->is_activo
			    	);
			}
			return $anuncios;
		} else
			return 0;
	}// dame_anuncios

	/**
	 * Descripción: Jala un anuncio de base de datos
	 * @param integer $id
	 * @return array $anuncio 	
	 */
	public function dame_anuncio($id){
		$query = $this->db->get_where('anuncios', array('id_anuncio' => $id));
		$anuncio = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
			    $anuncio = array(
			    	'id_anuncio' 		=> $row->id_anuncio,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'tipo_contenido' 	=> $row->tipo_contenido,
			    	'contenido' 		=> $row->contenido,
			    	'url'	  			=> $row->url,
			    	'url_img'	  		=> $row->url_img,
			    	'vigencia'			=> $row->vigencia,
			    	'activo'			=> $row->is_activo
			    	);
			}
			return $anuncio;
		} else
			return 0;
	}// dame_anuncio

	/**
	 * Descripción: Actualiza un anuncio de la base de datos
	 * @param integer $id_anuncio, string $anuncio, string $url, string $tipo
	 * @return true	
	 */
	public function actualiza_anuncio($id_anuncio, $anuncio, $url, $url_img, $tipo, $vigencia, $activo){
		$data = array(
		   'contenido' 		=> 	$anuncio,
		   'tipo_contenido' => 	$tipo,
		   'vigencia'   	=>	$vigencia,
		   'url' 			=> 	$url, 
		   'url_img' 		=> 	$url_img, 
		   'is_activo' 		=> 	$activo
		);

		// actualizar registro
		$this->db->where('id_anuncio', $id_anuncio);
		$this->db->update('anuncios', $data);

		return 1;
	} // actualiza_anuncio
		
}// clase Anuncio