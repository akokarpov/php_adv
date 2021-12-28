<?php
session_start();
$_SESSION['goodsLimit'] = 2;
include "config.php";
$errors = "";
$login = !empty($_POST['login']) ? strip_tags($_POST['login']) : $errors .= "Не указан логин!<br>";
$password = !empty($_POST['password']) ? md5(strip_tags($_POST['password'])) : $errors .= "Не указан пароль!<br>";

// Войти
if($_POST['signIn']){
    if(!empty($errors)){
        header("Location: /?page=auth&errors=$errors");
    } else {
        $sqlQuery = "select id, username, admin from users where login='$login' and password='$password'";
        $res = mysqli_query($connect, $sqlQuery);
        $data = mysqli_fetch_assoc($res);
        if(mysqli_num_rows($res) > 0) {
            $_SESSION['userId'] = $data['id'];
            $_SESSION['userName'] = $data['username'];
            if($data['admin'] == 1) {
                $_SESSION['admin'] = true;
                header("Location: /?page=orders");
            } else {
                $_SESSION['admin'] = false;
                header("Location: /");
            }
        } else {
            $_SESSION['userId'] = false;
            header("Location: /?page=auth&success_auth=false");
        }
    }
}

// Регистрация
if($_POST['signUp']) {
    $username =  !empty($_POST['username']) ? strip_tags($_POST['username']) : $errors .= "Поле Имя должно быть заполнено!<br>";
    $email =  !empty($_POST['email']) ? strip_tags($_POST['email']) : $errors .= "Поле Email должно быть заполнено!<br>";
    $phone =  !empty($_POST['phone']) ? strip_tags($_POST['phone']) : $errors .= "Поле Телефон должно быть заполнено!<br>";
    $address =  !empty($_POST['address']) ? strip_tags($_POST['address']) : $errors .= "Поле Адрес должно быть заполнено!<br>";
    if(!empty($errors)) {
        header("Location: /?page=auth&errors=$errors");
    } else {
        $sqlQuery = "insert into users(login, password, username, email, phone, address) values ('$login','$password','$username','$email','$phone','$address')";
        $res = mysqli_query($connect,$sqlQuery);
        if($res){
            header("Location: /?page=auth&success_reg=true");
        }
    }
}
?>