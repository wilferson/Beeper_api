<?php
$app->get('/users',function($request,$response,$args){
    return $this->view->render($response,'home.twig');
});
