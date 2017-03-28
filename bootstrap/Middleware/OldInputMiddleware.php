<?php

namespace Bootstrap\Middleware;

class OldInputMiddleware extends Middleware
{
    public function __invoke($request,$response,$next)
    {

       if(isset($_SESSION['old_data'])) 
       {
      $this->container->view->getEnvironment()->addGlobal('old_data',$_SESSION['old_data']);
       }
      $_SESSION['old_data']=$request->getParams();
      
       $response=$next($request,$response);
       return $response;
    }
}