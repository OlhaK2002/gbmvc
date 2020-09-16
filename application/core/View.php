<?php
namespace application\core;

class View{

    public $route;

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

    public function replyView($values = [])
    {
        extract($values);
        ob_start();
        include 'application/views/reply.php';
        $values = ob_get_contents();
    }

}
