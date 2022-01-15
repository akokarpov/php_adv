<?php
if($_GET['errors']){
    echo "<h2 style='color: crimson'>{$_GET['errors']}</h2><br>";
}
if($_GET['success_auth'] == 'false'){
    echo "<h2 style='color: crimson'>Неверное имя пользователя или пароль!</h2><br>";
} 
if($_GET['success_reg']){
    echo "<h2 style='color: darkgreen'>Регистрация прошла успешно! Теперь вы можете войти!</h2><br>";
}
?>

<div class='flexcontainer'>
<form class='signIn-form' action="../controllers/user.php" method="post">
    <h2>Войти</h2>
    <br>
    <p>Ваш логин</p>
    <input type="text" name="login">
    <p>Ваш пароль</p>
    <input type="password" name="password">
    <br>
    <br>
    <input type="submit" name="signIn" value="Войти">
</form>

<form class='signUp-form' action="../controllers/user.php" method="post">
    <h2>Регистрация</h2>
    <br>
    <p>Придумайте логин</p>
    <input type="text" name="login">
    <p>Придумайте пароль</p>
    <input type="password" name="password">
    <p>Ваше имя</p>
    <input type="text" name="username">
    <p>Ваш email</p>
    <input type="email" name="email">
    <p>Ваш телефон</p>
    <input type="phone" name="phone">
    <p>Адрес доставки</p>
    <textarea name="address" cols="30" rows="10"></textarea>
    <br>
    <br>
    <input type="submit" name="signUp" value="Зарегистрироваться">
</form>
</div>