<?php

namespace application\controllers;

use application\core\Controller;


Class RegistrationController extends Controller
{
    protected $name;
    protected $surname;
    protected $email;
    protected $login;
    protected $password1;
    protected $password2;

    public function registerAction()
    {
        $_SESSION['error_email']="";
        $_SESSION['error_login']="";
        $_SESSION['error_passwords']="";
        $_SESSION['error_password']="";
        $_SESSION['error_password1']="";

        $this->name = $_POST['Name'];
        $this->surname = $_POST['Surname'];
        $this->email = $_POST['Email'];
        $this->login = $_POST['Login'];
        $this->password1 = $_POST['Password1'];
        $this->password2 = $_POST['Password2'];

        $this->view->getView();

        $this->model->registerAction($this->name, $this->surname, $this->email, $this->login, $this->password1, $this->password2);
        $this->model->emailevidenceAction();
        $this->model->loginevidenceAction();
        $this->model->passwordsevidenceAction();
        $this->model->passwordevidenceAction();
        $this->model->password1evidenceAction();
        $this->model->hashAction();

        if($this->model->resultAction()){
            $_SESSION['error_email']="";
            $_SESSION['error_login']="";
            $_SESSION['error_passwords']="";
            $_SESSION['error_password']="";
            $_SESSION['error_password1']="";

            echo ' <script language="javascript">
                window.location.href = "/main/index"
              </script>';
        }
        else {
            echo ' <script language="javascript">
                window.location.href = "/registration/register"
              </script>';
        }


    }


}