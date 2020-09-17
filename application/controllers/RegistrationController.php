<?php

namespace application\controllers;

use application\core\Controller;


Class RegistrationController extends Controller
{

    public function registerAction()
    {
        $this->view->getView();
    }

    public function ajaxAction()
    {

        $this->model->ajaxAction($_POST['Name'], $_POST['Surname'], $_POST['Email'], $_POST['Login'], $_POST['Password1'], $_POST['Password2']);

        $array = $this->model->resultAction();
        $_SESSION['login']=$array['login'];
        $_SESSION['user_id']=$array['user_id'];
        $result1 = json_encode($array['error']);
        echo $result1;

    }


}