<?php 

namespace Bootstrap\Controllers;

use Bootstrap\Models\User;
use Bootstrap\Models\Token;
use Respect\Validation\Validator as v;

class TokenCreatorController extends Controller
{
  

    public function index($request,$response,$args)
    {
        

        return $this->container->view->render($response,'token.twig');
    } 


    public function createToken($request,$response,$args)
    {
        $validation=$this->container->validator->validate($request,[
            'email'=>v::noWhitespace()->notEmpty()->emailAvailable(),

        ]);
         if ($validation->failed()) 
              {
                $this->container->flash->addMessage('error-msg','Verifique los datos.'  );
                return $response->withRedirect($this->container->router->pathFor('token'));
              }

         //$this->container->flash->addMessage('info-msg','Token creado satisfactoriamente');
         $this->container->flash->addMessage('info-msg',"Token: " . password_hash(strtoupper ($request->getParam('email') . "beeper_api"), PASSWORD_DEFAULT));      
        return $response->withRedirect($this->container->router->pathFor('token'));
    }
}
