<?php

session_start();
$_SESSION['login']="";
$_SESSION['error']="";
$_SESSION['error_email']="";
$_SESSION['error_login']="";
$_SESSION['error_password']="";
$_SESSION['error_password1']="";
$_SESSION['error_passwords']="";
echo ' <script language="javascript">
                window.location.href = "/main/index"
              </script>';
