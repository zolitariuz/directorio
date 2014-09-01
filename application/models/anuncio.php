<?php
class Anuncio extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function agrega_anuncio($anuncio, $id_usuario, $tipo_contenido, $url, $url_img){
		$data = array(
		   'id_usuario' 		=> $id_usuario,
		   'tipo_contenido' 	=> $tipo_contenido,
		   'contenido' 			=> $anuncio,
		   'url' 				=> $url,
		   'url_img' 			=> $url_img
		);

		if($this->db->insert('anuncios', $data)){
			return 1;
		} else {
			return 0;
		} 
	}

	public function dame_anuncios(){
		$query = $this->db->get('anuncios');
		$anuncios = array();

		if($query->num_rows() > 0){
			foreach ($query->result() as $key=>$row)
			{
			    $anuncios[$key] = array(
			    	'id_anuncio' 		=> $row->id_anuncio,
			    	'id_usuario' 		=> $row->id_usuario,
			    	'tipo_contenido' 	=> $row->tipo_contenido,
			    	'contenido' 		=> $row->contenido,
			    	'url'	  			=> $row->url,
			    	'url_img'	 	=> $row->url_img,
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
			    	'url_img'	  			=> $row->url_img,
			    	);
			}
			return $anuncio;
		} else
			return 0;
	}// dame_anuncio
		
}// clase Anuncio