<?php

namespace application\core;

abstract class Controller {

    public $route;
    public $view;
    public $model;
    public $controller;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($this->route);
        $path = 'application\models\\'.ucfirst($this->route['controller']).'Model';
        if(class_exists($path))$this->model = new $path($this->route);

    }



}
