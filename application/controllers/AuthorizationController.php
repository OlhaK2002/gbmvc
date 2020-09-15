<?php

namespace application\controllers;

use application\core\Controller;
use PDO;

class AuthorizationController extends Controller
{
    protected $login;
    protected $password;

    public function loginAction()
    {
        $this->view->getView();
        $this->login = $_POST['login1'];
        $this->password = $_POST['password2'];
        $_SESSION['error']="";
        $this->model->loginAction($this->login, $this->password);
        $this->model->passwordAction();
    }



}