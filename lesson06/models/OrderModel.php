<?php

include 'models/DBModel.php';

class OrderModel {

    function new() {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = "select id from cart where userId = {$_SESSION['userId']} and status = 0";
        $answer = mysqli_query($connect, $query);
        $allItems = mysqli_fetch_all($answer, MYSQLI_ASSOC);
        $now = date('d.m.Y H:i:s');
        foreach ($allItems as $item) {
            $query = "insert into orders values (id, '{$item["id"]}', '{$now}') ";
            mysqli_query($connect, $query);
        }
        $query = "update cart set status=1 where userId = {$_SESSION['userId']} and status = 0";;
        mysqli_query($connect, $query);
        header('Location: /?controller=cart&action=index&message=success');
    }

    function get() {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = "select * from cart
        join orders on cart.id = cartId and status > 0
        join goods on cart.goodId = goods.id
        join users on cart.userId = users.id
        order by orders.datetime";
        $answer = mysqli_query($connect, $query);
        $allOrders = mysqli_fetch_all($answer, MYSQLI_ASSOC);
        return $allOrders;
    }

    function status() {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        foreach ($_POST as $item => $value):
            if($item !== 'status'):
                $query = "update cart set status={$_POST['status']} where id = {$value}";
                mysqli_query($connect, $query);
            endif;
        endforeach;
        header('Location: /?controller=order&action=index&message=changed');
    }
}

?>