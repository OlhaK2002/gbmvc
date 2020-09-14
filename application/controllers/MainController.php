<?php
namespace application\controllers;

use application\core\Controller;

Class MainController extends Controller
{
    public function indexAction()
    {
        $this->view->getView();
    }
}