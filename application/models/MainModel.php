<?php

namespace application\models;

use application\controllers\MainController;
use application\core\Model;

use application\core\View;
use PDO;

class MainModel extends Model
{
    protected $db;
    protected $sql;
    protected $result;
    protected $value0;
    protected $sql0;
    protected $array;
    protected $index;
    protected $array_view;


    public function indexAction()
    {
        $this->value0=0;
        $this->sql0 = $this->db->getConnect()->prepare("SELECT * FROM `comments` WHERE `parent_id`=:value");
        $this->sql0->bindParam(':value', $this->value0, PDO::PARAM_INT);
        $this->sql0->execute();

        while ($this->array = $this->sql0->FETCH(PDO::FETCH_ASSOC))
        {
            echo '<ul>';
            $this->othercommentsAction($this->array);
            echo '</ul>';
        }
        echo '<ul><li><div id="comment0"></div></li></ul>';

    }

    public function othercommentsAction($array)
    {
        $this->array = $array;
        $this->index = $this->array['id'];
        $this->sql = $this->db->getConnect()->prepare("SELECT * FROM `registor` INNER JOIN `comments` WHERE registor.user_id=comments.authorid AND comments.id=:id");
        $this->sql->bindParam(':id', $this->index, PDO::PARAM_STR);
        $this->sql->execute();

        $this->array = $this->sql->FETCH(PDO::FETCH_ASSOC);
        $this->index = $this->array['id'];

        $sql1 = $this->db->getConnect()->prepare("SELECT * FROM `comments` WHERE `parent_id`=:value");
        $sql1->bindParam(':value', $this->index, PDO::PARAM_INT);
        $sql1->execute();


            $this->array_view  = [
                'author' => "{$this->array['login']}",
                'data' => "{$this->array['data']}",
                'text' => "{$this->array['text']}",
                'id' => "{$this->array['id']}"
            ];

        $controller = new MainController($this->route);
        $controller->getcommentAction($this->array_view);

        $this->result = $sql1->rowCount();

        if ($this->result > 0)
        {

            while ($this->array = $sql1->FETCH(PDO::FETCH_ASSOC))
            {
                echo '<ul>';
                $this->othercommentsAction($this->array);
                echo '</ul>';
            }
        }

    }



}
