<?php

namespace application\models;

use application\core\Model;
use PDO;

class RegistrationModel extends Model
{
    protected $name;
    protected $surname;
    protected $email;
    protected $login;
    protected $password1;
    protected $password2;
    protected $password;
    protected $sql;
    protected $count_0=0;
    protected $count_A=0;
    protected $count_b=0;

    public function registerAction($name, $surname, $email, $login, $password1, $password2)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->login = $login;
        $this->password1 = $password1;
        $this->password2 = $password2;

    }

    public function emailevidenceAction()
    {

        $this->sql = $this->db->getConnect()->prepare("SELECT * FROM `registor` WHERE `email`= :email");
        $this->sql->bindParam(':email',$this->email,PDO::PARAM_STR);
        $this->sql->execute();
        if($this->sql->rowCount()>=1){$_SESSION['error_email'] = "Ваша почта уже используется другим пользователем";return false;}
        else {return true;}
    }

    public function loginevidenceAction()
    {
        $this->db->Connect();
        $this->sql = $this->db->getConnect()->prepare("SELECT * FROM `registor` WHERE `login`= :login");
        $this->sql->bindParam(':login',$this->login,PDO::PARAM_STR);
        $this->sql->execute();
        if($this->sql->rowCount()>=1){$_SESSION['error_login'] = "Ваш логин уже используется другим пользователем";return false;}
        else {return true;}
    }

    public function passwordsevidenceAction()
    {
        if($this->password1!=$this->password2){$_SESSION['error_passwords'] = "Пароли не совпадают";return false;}
        else {return true;}
    }

    public function passwordevidenceAction()
    {
        if(strlen($this->password1)>0&&strlen($this->password1)<6) {$_SESSION['error_password'] = "Пароль должен быть не меньше шести символов";return false;}
        else {return true;}
    }

    public function password1evidenceAction()
    {
        if (strlen($this->password1)>0){
            for($i=0;$i<strlen($this->password1);$i++) {

               // if (preg_match("#^".$this->password1[$i]."$#"))
                if(preg_match("#^[a-я]$#", $this->password1[$i]))$this->count_b++;
                if(preg_match("#^[a-я]$#", $this->password1[$i]))$this->count_A++;
                if ($this->password1[$i] >= 'A' && $this->password1[$i] <= 'Z') $this->count_A++;
                if ($this->password1[$i] >= 'a' && $this->password1[$i] <= 'z') $this->count_b++;
                if ($this->password1[$i] >= '0' && $this->password1[$i] <= '9') $this->count_0++;
            }

            if(!($this->count_A>0 && $this->count_b>0 && $this->count_0 >0)) {
                $_SESSION['error_password1']="Пароль должен содержать цифры, а также символы верхнего и нижнего регистра";
                return false;
            }

            else return true;
        }
    }

    public function hashAction()
    {
        $this->password = password_hash($this->password1, PASSWORD_DEFAULT);
        return $this->password;
    }
    public function intodbAction()
    {

        if(($this->emailevidenceAction())&&($this->loginevidenceAction())&&($this->passwordsevidenceAction())&&($this->passwordevidenceAction())&&($this->password1evidenceAction()))
        {
            $this->sql= $this->db->getConnect()->prepare("INSERT INTO `registor`(`name`,`surname`,`email`,`login`,`password1`) VALUES (:name, :surname, :email, :login, :password)");
            $this->sql->bindParam(':name', $this->name, PDO::PARAM_STR);
            $this->sql->bindParam(':surname', $this->surname, PDO::PARAM_STR);
            $this->sql->bindParam(':email', $this->email, PDO::PARAM_STR);
            $this->sql->bindParam(':login', $this->login, PDO::PARAM_STR);
            $this->sql->bindParam(':password', $this->password, PDO::PARAM_STR);
            $this->sql->execute();
            return true;
        }
        else return false;
    }

    public function evidencedbAction()
    {

        $this->sql = $this->db->getConnect()->prepare("SELECT * FROM `registor` WHERE `name`= :name and `surname`=:surname and `email`=:email and `login`=:login and `password1`=:password ");
        $this->sql->bindParam(':name', $this->name, PDO::PARAM_STR);
        $this->sql->bindParam(':surname', $this->surname, PDO::PARAM_STR);
        $this->sql->bindParam(':email', $this->email, PDO::PARAM_STR);
        $this->sql->bindParam(':login', $this->login, PDO::PARAM_STR);
        $this->sql->bindParam(':password', $this->password, PDO::PARAM_STR);
        $this->sql->execute();
        return $this->sql;

    }

    public function resultAction()
    {
        if($this->intodbAction())
        {
            $array = $this->evidencedbAction()->FETCH(PDO::FETCH_ASSOC);
            $_SESSION["login"] = $this->login;
            $_SESSION["password"] = "password";
            $_SESSION["user_id"] = $array['user_id'];
            $_SESSION['error']="";
            $_SESSION['error_email']="";
            $_SESSION['error_login']="";
            $_SESSION['error_password']="";
            $_SESSION['error_password1']="";
            $_SESSION['error_passwords']="";

            echo ' <script language="javascript">
                window.location.href = "/main/index"
              </script>';
        }
        else' <script language="javascript">
                window.location.href = "/registration/register"
              </script>';
    }


}
