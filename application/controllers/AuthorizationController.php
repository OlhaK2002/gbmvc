<?php

namespace application\controllers;

use application\core\Controller;

class AuthorizationController extends Controller
{

    public function loginAction()
    {
        $this->view->getView();
    }
    public function ajaxAction()
    {
        $this->model->ajaxAction($_POST['login1'], $_POST['password2']);
        $array = $this->model->passwordAction();
        $result = json_encode($array);
        echo $result;
    }


}