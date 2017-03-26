<?php 

namespace Bootstrap\Controllers;

use Bootstrap\Models\User;

class HomeController extends Controller
{
  

    public function index($request,$response,$args)
    {
        
        $user=User::where('username','wilferson')->first();
        var_dump($user->email);
        die();
        return $this->container->view->render($response,'home.twig');
    } 
}
