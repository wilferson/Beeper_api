<?php 

namespace Bootstrap\Controllers;

class HomeController extends Controller
{
  
    public function index($request,$response,$args)
    {
        
       
        return $this->container->view->render($response,'home.twig');
    } 
}
