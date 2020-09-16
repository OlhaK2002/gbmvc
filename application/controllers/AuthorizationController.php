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
        $_SESSION['error'] = "";
        $this->model->loginAction($this->login, $this->password);
        if($this->model->passwordAction()){
            $_SESSION['error']="";
            /*ob_get_flush();
            ob_start();
            header('Location: /main/index');
            ob_get_clean();
            ob_end_clean();*/
        }
        else {
            $_SESSION['error']="Неверно указан логин или пароль";
        }
    }


}