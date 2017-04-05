<?php

namespace Bootstrap\Middleware;

class AuthApiMiddleware extends Middleware
{
    public function __invoke($request,$response,$next)
    {
        if (!($this->container->auth->check()))
        {
            
            return $response->withStatus(403);
        }
       $response=$next($request,$response);
       return $response;
    }
}