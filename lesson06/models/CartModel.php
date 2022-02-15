<?php

include 'models/DBModel.php';

class CartModel {

    function getGoodsInCart() {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = "SELECT goodId, title, price * count AS sum, count FROM goods
        INNER JOIN cart ON cart.goodId = goods.id
        AND userId = {$_SESSION['userId']} AND status = 0";
        $response = mysqli_query($connect, $query);
        $goodsInCart = mysqli_fetch_all($response, MYSQLI_ASSOC);
        return $goodsInCart;
    }

    function addGood($goodId) {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = "select id from cart where goodId = $goodId and userId = {$_SESSION['userId']} and status = 0";
        $response = mysqli_query($connect, $query);
        $goodInCart = mysqli_fetch_assoc($response)['id'];
        $message = "";
        if($goodInCart == null) {
            $query = "insert into cart values (id, $goodId, 1, {$_SESSION['userId']}, 0)";
            $message .= "<h1 style='color: darkgreen'>Товар успешно добавлен в корзину!</h1><br>";
        } else {
            $query = "update cart set count=count+1 where goodId = $goodId";
            $message .= "<h1 style='color: darkgreen'>Товар был в корзине! Добавили еще одну единицу!</h1><br>";
        }
        mysqli_query($connect, $query);
        return $message;
    }

    function removeGood($goodId) {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = "select count from cart where goodId = $goodId and userId = {$_SESSION['userId']}";
        $response = mysqli_query($connect, $query);
        $count = mysqli_fetch_assoc($response)['count'];
        if($count > 1){   
            $query = "update cart set count=count-1 where goodId = $goodId and userId = {$_SESSION['userId']}";    
        } else {
            $query = "delete from cart where goodId = $goodId and userId = {$_SESSION['userId']}";         
        }
        mysqli_query($connect, $query);
    }

    function deleteGood($goodId) {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = "delete from cart where goodId = $goodId and userId = {$_SESSION['userId']}";
        mysqli_query($connect, $query);
    }

}

?>