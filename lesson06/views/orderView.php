<h2 style='color: darkgreen'>Список заказов</h2>
<br>

<?php
$countArr = 0;
foreach ($orders as $order):

    $prevId = $orders[$countArr-1]['userId'];
    $thisId = $orders[$countArr]['userId'];
    $nextId = $orders[$countArr+1]['userId'];

    if($prevId === null or $prevId !== $thisId):
    $grandTotal = 0;
    ?>
    <form method="post" action="index.php?controller=order&action=status">
    <p><strong>Дата:</strong> <?=$order['datetime']?></p>
    <p><strong>Заказчик:</strong> <?=$order['username']?></p>
    <p><strong>Адрес:</strong> <?=$order['address']?></p>
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

    <input name="<?=$order['cartId']?>" type="hidden" value="<?=$order['cartId']?>">
    
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
    <label for="Статус">Статус:</label>
        <select name="status" id="status">
            <option name="status" <?php if($order['status'] == 1) echo "selected"?> value="1">Новый</option>
            <option name="status" <?php if($order['status'] == 2) echo "selected"?> value="2">В работе</option>
            <option name="status" <?php if($order['status'] == 3) echo "selected"?> value="3">Приостановлен</option>
            <option name="status" <?php if($order['status'] == 4) echo "selected"?> value="4">Отменен</option>
            <option name="status" <?php if($order['status'] == 5) echo "selected"?> value="5">Выполнен</option>
        </select>
        <input type="submit" value="OK">
    </form>
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