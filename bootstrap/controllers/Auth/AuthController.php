<?php 

namespace Bootstrap\Controllers\Auth;
use Bootstrap\Controllers\Controller;
use Bootstrap\Models\User;
use Respect\Validation\Validator as v;
class AuthController extends Controller
{

    public function getLogout($request,$response,$args)
    {
        $this->container->auth->logout();
              $this->container->flash->addMessage('info-msg','Hasta luego.');
        return $response->withRedirect($this->container->router->pathFor('home'));
    }


    public function getSignIn($request,$response,$args)
    {
        $this->container->view->render($response,'auth/signin.twig');
    }


    public function postSignIn($request,$response,$args)
    {
        $auth=($this->container->auth->attempt($request->getParams()));
       if (!$auth){
          $this->container->flash->addMessage('error-msg','Datos incorrectos.');
          return $response->withRedirect($this->container->router->pathFor('auth.signin'));
       }
          
          $this->container->flash->addMessage('info-msg,','Bienvenido, ' . $auth->user->username);
          return $response->withRedirect($this->container->router->pathFor('home'));
    }

    
    public function getSignUp($request,$response,$args)
    {
        return $this->container->view->render($response,'auth/signup.twig');
    }


    public function  postSignUp($request,$response,$args)
    {
       
      $validation=$this->container->validator->validate($request,[
            'email'=>v::noWhitespace()->notEmpty()->emailAvailable(),
            'username'=>v::alpha()->notEmpty()->usernameAvailable(),
            'password'=>v::noWhitespace()->notEmpty(),
      ]);

      if ($validation->failed()) {
          $this->container->flash->addMessage('error-msg','Verifique los datos.');
          return $response->withRedirect($this->container->router->pathFor('auth.signup'));
      }


        $user = User::create([
            'email'=>$request->getParam('email'),
            'username'=>$request->getParam('username'),
            'password'=>password_hash( $request->getParam('password'),PASSWORD_DEFAULT),
            
        ]);
        $this->container->auth->attempt($request->getParams());
        $this->container->flash->addMessage('info-msg','Usuario registrado satisfactoriamente.');
        return $response->withRedirect($this->container->router->pathFor('home'));
    }

}
