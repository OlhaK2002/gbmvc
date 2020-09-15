<?php

namespace application\models;

use application\core\Model;
use PDO;

class AuthorizationModel extends Model
{
    protected $login;
    protected $password;
    protected $sql;
    protected $array;
    protected $hash;
    protected $password_verification;

    public function loginAction($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

    }
    public function evidenceAction()
    {
        $this->sql = $this->db->getConnect()->prepare("SELECT * FROM `registor` WHERE `login`= :login LIMIT 1");
        $this->sql->bindParam(':login',$this->login,PDO::PARAM_INT);
        $this->sql->execute();
        $this->array = $this->sql->FETCH(PDO::FETCH_ASSOC);
        $this->hash=$this->array['password1'];
        $this->password_verification = password_verify($this->password,$this->hash);
        return $this->password_verification;

    }
    public function passwordAction()
    {
        if($this->evidenceAction()){
            $_SESSION["login"] = $this->login;
            $_SESSION["password"] = "password";
            $_SESSION['error']="";
            $_SESSION['user_id'] = $this->array['user_id'];
            echo ' <script language="javascript">
                window.location.href = "/main/index"
              </script>';
        }
        else {$_SESSION['error']="Неверно указан логин или пароль";
       ' <script language="javascript">
                window.location.href = "/authorization/login"
              </script>';
        }
    }
}