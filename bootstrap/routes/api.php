<?php
// Rutas de la api exclusivamente

$app->group('/api',function (){
// Partes de la api que requiere autentificacion
    $this->get('/services','ServicesController:getServices');
    $this->get('/clients','ClientsController:getClients');

})->add(new \Bootstrap\Middleware\AuthApiMiddleware($container));


$app->post('/api/signin','ApiSigninController:postSignin')->setName('api.signin');
