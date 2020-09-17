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
        $this->model->emailevidenceAction();
        $this->model->loginevidenceAction();
        $this->model->passwordsevidenceAction();
        $this->model->passwordevidenceAction();
        $this->model->password1evidenceAction();
        $this->model->hashAction();

        $array = $this->model->resultAction();
        $result1 = json_encode($array);
        echo $result1;

    }


}