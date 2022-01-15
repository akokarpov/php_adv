<?php

include 'DBModel.php';

class UserModel {

    function getOrders() {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = "select * from cart
        join orders on cart.id = cartId and status > 0
        join goods on cart.goodId = goods.id
        join users on cart.userId = users.id
        where users.id = {$_SESSION['userId']}
        order by orders.datetime";
        $answer = mysqli_query($connect, $query);
        $allOrders = mysqli_fetch_all($answer, MYSQLI_ASSOC);
        return $allOrders;
    }

    function auth($postData) {

        $_SESSION['goodsLimit'] = 2;
        $errors = "";
        $login = !empty($postData['login']) ? strip_tags($postData['login']) : $errors .= "<h2 style='color: crimson'>Не указан логин!</h2><br>";
        $password = !empty($postData['password']) ? md5(strip_tags($postData['password'])) : $errors .= "<h2 style='color: crimson'>Не указан пароль!</h2><br>";

        $DB = DB::getDB();
        $connect = $DB->getConnect();

        if($postData['signIn']){
            if(!empty($errors)){
                return $errors;
            } else {
                $query = "select id, username, admin from users where login='$login' and password='$password'";
                $response = mysqli_query($connect, $query);
                $data = mysqli_fetch_all($response, MYSQLI_ASSOC);
                if(!$data) {
                    $errors .= "<h2 style='color: crimson'>Неверный логин или пароль! Попробуйте еще раз!</h2>";
                    return $errors;
                } else {
                    $_SESSION['userId'] = $data[0]['id'];
                    $_SESSION['userName'] = $data[0]['username'];
                    if($data[0]['admin'] == 1) {
                        $_SESSION['admin'] = true;
                        return "<h2 style='color: darkgreen'>С возвращением, администратор!</h2>";
                    } else {
                        $_SESSION['admin'] = false;
                        return "<h2 style='color: darkgreen'>Добрый день, {$_SESSION['userName']}!</h2>";
                    }
                }
            }
        }

        if($postData['signUp']) {
            $username =  !empty($postData['username']) ? strip_tags($postData['username']) : $errors .= "<h2 style='color: crimson'>Не указано имя!</h2><br>";
            $email =  !empty($postData['email']) ? strip_tags($postData['email']) : $errors .= "<h2 style='color: crimson'>Не указан Email!</h2><br>";
            $phone =  !empty($postData['phone']) ? strip_tags($postData['phone']) : $errors .= "<h2 style='color: crimson'>Не указан Телефон!</h2><br>";
            $address =  !empty($postData['address']) ? strip_tags($postData['address']) : $errors .= "<h2 style='color: crimson'>Не указан Адрес!</h2><br>";
            if(!empty($errors)) {
                return $errors;
            } else {
                $query = "insert into users(login, password, username, email, phone, address) values ('$login','$password','$username','$email','$phone','$address')";
                $response = mysqli_query($connect, $query);
                if($response){
                    return "<h2 style='color: darkgreen'>$username, регистрация закончена! Теперь вы можете войти!</h2>";
                }
            }
        }
    }
}

?>