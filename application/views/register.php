<?php
echo '<ul>';
{echo '<li><span style="color: red">'.$_SESSION['error_email'].'</span></li><br/>';}
{echo '<li><span style="color: red">'.$_SESSION['error_login'].'</span></li><br/>';}
{echo '<li><span style="color: red">'.$_SESSION['error_passwords'].'</span></li><br/>';}
{echo '<li><span style="color: red">'.$_SESSION['error_password'].'</span></li><br/>';}
{echo '<li><span style="color: red">'.$_SESSION['error_password1'].'</span></li><br/>';}
echo '</ul>';
?>
<div class="field">
    <span id="title2">Регистрация:</span><br/>
    <form method="post" action="/registration/register">
        <span>Имя: </span><br/>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="text" name="Name"/><br/><br/>
        <span>Фамилия: </span><br/>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="text" name="Surname"/><br/><br/>
        <span>Почта: </span><br/>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="email" name="Email"/><br/><br/>
        <span>Логин: </span><br/>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="text" name="Login" /><br/><br/>
        <span>Пароль: </span><br/>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="password" name="Password1" /><br/><br/>
        <span>Подтверждение пароля:</span><br/>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="password" name="Password2" /><br/><br/>
        <button type="submit" name="Button_s" class="btn btn-light" >Зарегистрироваться</button>
    </form>
</div>
