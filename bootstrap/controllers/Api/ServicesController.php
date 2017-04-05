<?php 

namespace Bootstrap\Controllers\Api;
use Bootstrap\Models\User;
use Bootstrap\Controllers\Controller;

class ServicesController extends Controller
{
  

    public function getServices($request,$response,$args)
    {


        // obtener y construir un objeto con la lista de servicios
        $result=[ 'test'=>'ok',
        ] ;

        return json_encode($result);
    } 
}
