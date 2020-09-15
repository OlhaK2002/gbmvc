<?php

namespace application\core;

use application\lib\DB;

abstract class Controller {

    public $route;
    public $view;
    public $model;
    protected $db;

    public function __construct($route)
    {
        $this->db = new DB();
        $this->db->Connect();
        $this->route = $route;
        $this->view = new View($this->route);
        $path = 'application\models\\'.ucfirst($this->route['controller']).'Model';
        if(class_exists($path))$this->model = new $path($this->route);

    }



}
