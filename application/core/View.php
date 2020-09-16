<?php
namespace application\core;

class View{

    public $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function getView($value = [])
    {

        if(empty($value)){
        include 'application/views/layout.php';
        }
        extract($value);
        $action = $this->route['action'];
        if(file_exists('application/views/'.$action.'.php'))include 'application/views/'.$action.'.php';

            ob_start();
            include 'application/views/reply.php';
            $value = ob_get_contents();



        include 'application/views/end.php';

    }

}
