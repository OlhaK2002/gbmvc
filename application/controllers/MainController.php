<?php

namespace application\controllers;

use application\core\Controller;
use PDO;

class MainController extends Controller
{

    public function indexAction()
    {
        $this->view->getView();
        $array = $this->model->indexAction();

        foreach ($array as $keys => $values)
        {
            for($i=0;$i<$values['nesting'];$i++)
                echo '<ul>';

            $this->view->replyView($values);

            for($i=0;$i<$values['nesting'];$i++)
                echo '</ul>';
        }
    }







}