<?php

namespace application\controllers;

use application\core\Controller;
use PDO;

class MainController extends Controller
{

    public function indexAction()
    {
        $this->view->getView();

        $this->model->indexAction();

    }
    public function getcommentAction($array)
    {
        $this->view->replyView($array);
    }



}