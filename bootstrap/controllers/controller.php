<?php

namespace Bootstrap\Controllers;
use \Slim\Views\Twig as View;
class Controller
{

    protected $container;

    public function __construct($container)
    {
      $this->container= $container;
   
    }
}