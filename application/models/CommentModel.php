<?php

namespace application\models;

use application\core\Model;

use application\core\View;
use PDO;

class CommentModel extends Model
{
    protected $text;
    protected $parent_id;
    protected $authorid;
    protected $sql;
    protected $count = 0;
    protected $array;
    protected $id;
    protected $array1;
    protected $index;

    public function commentsAction( $text, $parent_id, $author_id)
    {
        $this->text = $text;
        $this->parent_id = $parent_id;
        $this->authorid = $author_id;
    }

    public function intoAction()
    {
        if($this->text!=""&&$this->authorid!=""&&$this->count<1)
        {
            $this->sql = $this->db->getConnect()->prepare("INSERT INTO `comments` (`authorid`,`text`, `parent_id`) VALUES ( :authorid, :text, :parent_id)");
            $this->sql->bindParam(':authorid', $this->authorid, PDO::PARAM_STR);
            $this->sql->bindParam(':text', $this->text, PDO::PARAM_STR);
            $this->sql->bindParam(':parent_id', $this->parent_id, PDO::PARAM_INT);
            $this->sql->execute();
            $this->count++;
        }
        return true;
    }

    public function evidenceAction()
    {
        if($this->text!=""&&$this->authorid!=""){
            if($this->intoAction())
            {
                $this->sql = $this->db->getConnect()->prepare("SELECT * FROM `comments` WHERE `text`=:text and `parent_id`=:parent_id");
                $this->sql->bindParam(':text', $this->text, PDO::PARAM_STR);
                $this->sql->bindParam(':parent_id', $this->parent_id, PDO::PARAM_INT);
                $this->sql->execute();
                return $this->sql;
            }
        }
    }



    public function replyAction()
    {
        if($this->text!=""&&$this->authorid!=""){
            if($this->evidenceAction())
            {
                $this->array = $this->evidenceAction()->FETCH(PDO::FETCH_ASSOC);
                $this->id = $this->array['id'];
                $this->sql = $this->db->getConnect()->prepare("SELECT * FROM `registor` INNER JOIN `comments` WHERE registor.user_id=comments.authorid AND comments.id=:id");
                $this->sql->bindParam(':id', $this->id, PDO::PARAM_STR);
                $this->sql->execute();
                $this->array1 = $this->sql->FETCH(PDO::FETCH_ASSOC);
                $this->index = $this->array1['id'];

                $array_view  = [
                    'author' => "{$this->array1['login']}",
                    'data' => "{$this->array1['data']}",
                    'text' => "{$this->array1['text']}",
                    'id' => "{$this->array1['id']}"
                ];

                return $array_view;

            }
        }
    }
}