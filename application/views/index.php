<?php

if($_SESSION['login']!=""){
     echo '<textarea required name="text" id="text_id0" class="form-control" placeholder="Введите Ваш комментарий..."></textarea>
    <input type="hidden" id="parent_id0" class="parent" name="parent_id" value="0">
    <button id="0" type="submit" class="btn btn-light">Отправить</button>';
}

else {
    echo 'Для того чтобы оставить свой отзыв - '.'<a href="/authorization/login">войдите</a>'.' или '.'<a href="/registration/register">зарегистрируйтеся</a>';

}


