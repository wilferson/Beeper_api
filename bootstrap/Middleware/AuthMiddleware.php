<?php

namespace Bootstrap\Middleware;

class AuthMiddleware extends Middleware
{
    public function __invoke($request,$response,$next)
    {
        if (!($this->container->auth->check()))
        {
            $this->container->flash->addMessage('error-msg','Debes de iniciar sesion antes de hacer eso-
            .');
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }
       $response=$next($request,$response);
       return $response;
    }
}