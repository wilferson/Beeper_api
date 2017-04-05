<?php

$app->get('/','HomeController:index')->setName('home');

// Autentificacion rutas basicas




//Require autentificacion

$app->group('', function ()
{
    $this->get('/auth/logout','AuthController:getLogout')->setName('auth.logout');
    $this->get('/token','TokenCreatorController:index')->setName('token');
    $this->post('/token','TokenCreatorController:createToken');

})->add(new \Bootstrap\Middleware\AuthMiddleware($container));

//Para invitados

$app->group('',function  ()
{
    $this->get('/auth/signup','AuthController:getSignUp')->setName('auth.signup');
    $this->post('/auth/signup','AuthController:postSignUp');

    $this->get('/auth/signin','AuthController:getSignIn')->setName('auth.signin');
    $this->post('/auth/signin','AuthController:postSignIn');

    

})->add(new \Bootstrap\Middleware\GuestMiddleware($container));