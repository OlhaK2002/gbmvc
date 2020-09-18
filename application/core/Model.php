<?php
namespace application\core;

use application\lib\DB;

class Model
{
    protected $db;
    public $route;
    public $controller;
    public function __construct($route)
    {
        $this->db = new DB();
        $this->db->Connect();
        $this->route = $route;

       /* $path = 'application\controllers\\'.ucfirst($this->route['controller']).'Controller';
        if(class_exists($path))$this->controller = new $path($this->route);*/
    }

}
