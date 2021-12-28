<?php

include './controllers/config.php';

if($_GET['success_auth']){
    echo "<h2 style='color: darkgreen'>Вход под админом!</h2>";
}

$ordersList = getOrders($connect);

foreach($ordersList as $orderDate => $orderData):?>
    <p><strong>Дата заказа:</strong> <?=$orderDate?></p>
    <?php
    foreach($orderData as $item):?>
    <p><strong>Товар:</strong> <?=$item["title"]?></p>
    <p><strong>Кол-во:</strong> <?=$item["count"]?></p>
    <p><strong>Цена:</strong> <?=$item["price"]?></p>
    <p><strong>Стоимость:</strong> <?=$item["sum"]?></p>
    <br>
    <?
    endforeach;
    ?>
    <a href="#"><button>Обработать заказ</button></a>
    <br>
    <hr>
<?
endforeach;
?>