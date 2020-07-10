<?php

namespace Source\controller;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller{ 

    /**@var Router */
    protected $router;

    /**@var Engine */
    protected $view;

    public function __construct($router){
        $this->router = $router;
        $this->view = Engine::create(dirname(__DIR__,1)."/view","php");
        $this->view->addData(['router' => $this->router]);
    }
    
    public function ajaxResponse(string $param, array $values): string{
        return json_encode([$param => $values]);
    }
}