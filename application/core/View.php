<?php
namespace application\core;

class View{

    public $route;
    public $template;
    public $params = [];
    public $action;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function getView()
    {
        include 'application/views/layout.php';
        $action = $this->route['action'];
        include 'application/views/'.$action.'.php';
        include 'application/views/end.php';

    }

}
