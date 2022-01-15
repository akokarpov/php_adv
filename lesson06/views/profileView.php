<h2 style='color: darkgreen'><?=$_SESSION['userName']?>, это — ваш личный кабинет.</h2>
<br>

<p><strong>Ваши заказы:</strong></p>
<br>

<?php
function getStatusStr($status) {
    switch ($status) {
        case 1:
            return "Новый";
        case 2:
            return "В работе";
        case 3:
            return "Приостановлен";
        case 4:
            return "Отменен";
        case 5:
            return "Выполнен";
    }
}
$countArr = 0;
foreach ($orders as $order):

    $prevId = $orders[$countArr-1]['datetime'];
    $thisId = $orders[$countArr]['datetime'];
    $nextId = $orders[$countArr+1]['datetime'];

    if($prevId === null or $prevId !== $thisId):
    $grandTotal = 0;
    ?>

    <p><strong>Дата:</strong> <?=$order['datetime']?></p>
    <table>
    <tr>
        <th>Товар</th>
        <th>Кол-во</th>
        <th>Цена</th>
        <th>Итого</th>
    </tr>
    <?php
    endif;
    ?>
    
    <tr>
        <td><?=$order['title']?></td>
        <td><?=$order['count']?></td>
        <td><?=$order['price']?></td>
        <td><?=$order['count'] * $order['price']?></td>
    </tr>  

    <?php
    if($nextId === null or $thisId !== $nextId):?>
    </table>
    <p><strong>Cтоимость:</strong> <?=$grandTotal?></p>
    <p><strong>Статус:</strong> <?=getStatusStr($order['status'])?></p>
    <br>
    <br>
    <?php
    endif;
    ?>

<?php
$grandTotal += $order['count'] * $order['price'];
$countArr++;
endforeach;
?>

<p><strong>Вы недавно смотрели:</strong></p>
<br>
<ol>
    <?php for ($i=count($_SESSION['visitedPages'])-1; $i > count($_SESSION['visitedPages'])-6; $i--):?>
        <li><?=$_SESSION['visitedPages'][$i]?></li>
    <?php endfor;?>
</ol>