<?php
echo '<ul>';
if($_SESSION['error_email']!=""){echo '<li><span style="color: red">'.$_SESSION['error_email'].'</span></li><br/>';}
if($_SESSION['error_login']!=""){echo '<li><span style="color: red">'.$_SESSION['error_login'].'</span></li><br/>';}
if($_SESSION['error_passwords']!=""){echo '<li><span style="color: red">'.$_SESSION['error_passwords'].'</span></li><br/>';}
if($_SESSION['error_password']!=""){echo '<li><span style="color: red">'.$_SESSION['error_password'].'</span></li><br/>';}
if($_SESSION['error_password1']!=""){echo '<li><span style="color: red">'.$_SESSION['error_password1'].'</span></li><br/>';}
echo '</ul>';
?>
<div class="field">
    <span id="title2">Регистрация:</span><br/>
        <span>Имя: </span><br/>
        <input id="Name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="text" name="Name"/>
        <br/><br/><span>Фамилия: </span><br/>
        <input id="Surname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="text" name="Surname"/>
        <br/><br/><span>Почта: </span><br/>
        <input id="Email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="email" name="Email"/>
        <div id="error_email" style="color: red"></div>
        <br/><br/><span>Логин: </span><br/>
        <input id="Login" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="text" name="Login" />
        <div id="error_login" style="color: red"></div>
        <br/><br/><span>Пароль: </span><br/>
        <input id="Password1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="password" name="Password1" />
        <div id="error_password" style="color: red"></div>
        <div id="error_password1" style="color: red"></div>
        <br/><br/><span>Подтверждение пароля:</span><br/>
        <input id="Password2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="password" name="Password2" />
        <div id="error_passwords" style="color: red"></div>
        <br/><br/><button id="registration" type="submit" name="Button_s" class="btn btn-light" >Зарегистрироваться</button>
</div>
