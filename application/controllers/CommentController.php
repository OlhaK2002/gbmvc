<?php


namespace application\controllers;

use application\core\Controller;
use PDO;

class CommentController extends Controller
{
    public function commentsAction()
    {
        $this->model->commentsAction("{$_POST['text']}", "{$_POST['parent_id']}", "{$_SESSION['user_id']}");
        $this->model->replyAction();
    }
}