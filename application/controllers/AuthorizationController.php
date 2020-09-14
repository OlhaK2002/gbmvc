<?php

namespace application\controllers;

use application\core\Controller;

class AuthorizationController extends Controller
{
    protected $data = [];



    public function loginAction()
    {
        $this->view->getView();

        /* $path = 'application\controllers\RegistrationController';
        $controller = new $path($this->route);
         $controller->getName();*/

        $this->data = $this->model->get_data();
        var_dump($this->data);
       /* $path = 'application\controllers\AVerificationController';
        $controller = new $path($this->route);
        echo $controller->verification();*/
    }

}