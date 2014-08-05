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
    }
     
    function info_tramites_get()
    {
        $this->load->model('info_ts');
        $users = $this->info_ts->getInfoTramites();
         
        if($users)
        {
            $this->response($users, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }

    function consulta_materia_get()
    {
        $this->load->model('consulta_materia');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $materia = $this->consulta_materia->getTramiteServicioMateria( $this->get('id') );
         
        if($materia)
        {
            $this->response($materia, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }
}
?>