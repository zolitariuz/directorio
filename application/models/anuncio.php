<?php
class Anuncio extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->actualizaStatus();
	}

	public function agrega_anuncio($anuncio, $id_usuario, $tipo_contenido, $url, $url_img, $fecha_inicial, $fecha_final, $activo){
		$data = array(
		   'id_usuario' 		=> $id_usuario,
		   'tipo_contenido' 	=> $tipo_contenido,
		   'contenido' 			=> $anuncio,
		   'url' 				=> $url,
		   'url_img' 			=> $url_img,
		   'fecha_inicial'		=> $fecha_inicial,
		   'fecha_final'		=> $fecha_final,
		   'is_activo'			=> $activo,
		   'is_default'			=> 'f'
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
			    	'fecha_inicial'		=> $row->fecha_inicial,
			    	'fecha_final'		=> $row->fecha_final,
			    	'activo'			=> $row->is_activo,
			    	'is_default'		=> $row->is_default
			    	);
			}
			return $anuncios;
		} else
			return 0;
	}// dame_anuncios

	public function dame_anuncios_activos(){
		$this->db->where("(fecha_inicial <= DATE 'today' AND fecha_final >= DATE 'today' AND is_activo = 't') OR is_default = 't'");
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
			    	'fecha_inicial'		=> $row->fecha_inicial,
			    	'fecha_final'		=> $row->fecha_final,
			    	'activo'			=> $row->is_activo,
			    	'is_default'		=> $row->is_default
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
			    	'fecha_inicial'		=> $row->fecha_inicial,
			    	'fecha_final'		=> $row->fecha_final,
			    	'activo'			=> $row->is_activo,
			    	'is_default'		=> $row->is_default
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
	public function actualiza_anuncio($id_anuncio, $anuncio, $url, $url_img, $tipo, $fecha_inicial, $fecha_final,  $activo){
		$data = array(
		   'contenido' 		=> 	$anuncio,
		   'tipo_contenido' => 	$tipo,
		   'fecha_inicial'  =>	$fecha_inicial,
		   'fecha_final'	=>	$fecha_final,	
		   'url' 			=> 	$url, 
		   'url_img' 		=> 	$url_img, 
		   'is_activo' 		=> 	$activo
		);

		// actualizar registro
		$this->db->where('id_anuncio', $id_anuncio);
		$this->db->update('anuncios', $data);

		return 1;
	} // actualiza_anuncio

	/**
	 * Descripción: Revisa la vigencia y desactiva anuncios caducados
	 * @param 
	 * @return 	
	 */
	private function actualizaStatus(){
		// actualizar registro
		$data = array('is_activo' => 'f');
		$this->db->where("fecha_final < DATE 'today' AND is_activo = 't' AND is_default <> 't'");
		$this->db->update('anuncios', $data);
	}
		
}// clase Anuncio