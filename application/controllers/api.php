<?php
require(APPPATH.'/libraries/REST_Controller.php');
 
class Api extends REST_Controller
{
    function info_tramite_get()
    {
        $this->load->model('info_ts');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $tramite = $this->info_ts->getInfoTramite( $this->get('id') );
         
        if($tramite)
        {
            $this->response($tramite, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // end info_tramite_get
     
    function tramites_get()
    {
        $this->load->model('info_ts');
        $tramites = $this->info_ts->getTramitesServicios(1);
         
        if($tramites)
        {
            $this->response($tramites, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // end tramite_get

    function servicios_get()
    {
        $this->load->model('info_ts');
        $servicios = $this->info_ts->getTramitesServicios(2);
         
        if($servicios)
        {
            $this->response($servicios, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // end servicios_get

    function requisitos_get()
    {
        $this->load->model('info_ts');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $tramite = $this->info_ts->getRequisitos( $this->get('id') );
         
        if($tramite)
        {
            $this->response($tramite, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // end requisitos_get

    function requisitos_esp_get()
    {
        $this->load->model('info_ts');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $tramite = $this->info_ts->getRequisitosEsp( $this->get('id') );
         
        if($tramite)
        {
            $this->response($tramite, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // end requisitos_esp_get

    function formatos_get(){
        $this->load->model('formato_ts');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $formato = $this->formato_ts->getFormato( $this->get('id') );
         
        if($formato)
        {
            $this->response($formato, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // end formatos_get

    function area_atencion_get(){
        $this->load->model('area_atencion');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $area_atencion = $this->area_atencion->getAreaAtencion( $this->get('id') );
         
        if($area_atencion)
        {
            $this->response($area_atencion, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // end area_atencion_get


} // end class Api
?>