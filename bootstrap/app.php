<?php

session_start();
require __DIR__ .'/../vendor/autoload.php';

$app=new \Slim\App([
    'sttings'=>[
        'displayErrorDetails' => true,
        'db'=>[
            'driver'=>'mysql',
            'host'=>'localhost',
            'database'=>'beeper_app', //NOmbre de la base de datos
            'username'=>'root',
            'password'=>'',
            'charset'=>'utf8',
            'collation'=>'utf8_unicode_ci',
            'prefix'=>'',
        ],
    ],
    

]);



$container =$app->getContainer();
//Configurar y arrancar el motor de bases de datos ELOQUENT
$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection($container['sttings']['db']);

$capsule->setAsGlobal();

$capsule->bootEloquent();
// Finializada la configuracion de Eloquent
$container['db']=function ($container) use ($capsule)
{
return $capsule;
};
$container['view']=function($container){
    $view=new \Slim\Views\Twig(__DIR__ . '/../resources/views',[
        'cache'=>false,
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()    
    ));
    return $view;
};


$container['HomeController']= function ($container){
    return new \Bootstrap\Controllers\HomeController($container);
};



//require las rutas

require __DIR__ . '/routes/other.php';
require __DIR__ . '/routes/users.php';