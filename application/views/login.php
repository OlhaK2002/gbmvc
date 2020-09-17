<?php if($_SESSION['error']!=""){echo '<li><span style="color: red">'.$_SESSION['error'].'</span></li><br/>';}?>

<div class="field">
    <span id="title2">Авторизация:</span><br/>

        <span>Логин: </span><br/>
        <input id="login1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="text" name="login1"><br/><br/>
        <span>Пароль: </span><br/>
        <input id="password2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required type="password" name="password2">
        <div id="result" style="color: red"></div><br/><br/>
        <button id="authorization" type="submit" class="btn btn-light">Войти</button>

</div>