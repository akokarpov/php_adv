<?php
    if($goodsInCart):
?>  
    <div>
    <?php
    $totalCart = 0;
    foreach($goodsInCart as $good):?>
    <p><strong>Товар:&nbsp;</strong><?=$good['title']?></p>
    <p><strong>Кол-во:&nbsp;</strong>
    <input style="width:35px" type="number" min="1" max="50" name="count" value=<?=$good['count']?> id=<?=$good['goodId']?>>
    </p>
    <p><strong>Цена:&nbsp;</strong><span name="price"><?=$good['price']?></span></p>
    <p><strong>Итого:&nbsp;</strong><span id="output-total<?=$good['goodId']?>"><?=$good['sum']?></span></p>
    <a href="/?controller=cart&id=<?=$good['goodId']?>&action=delete"><button>Удалить</button></a>
    <br>
    <hr>
    <?php $totalCart += intval($good['sum']);?>
    <?php
    endforeach;
    ?>
    <h1>Итого: <span id="output-grandtotal"><?=$totalCart?></span>&nbsp;&#8381;.</h1>
    <br>
    <form action="">
    <input type="submit" value="Заказ">
    </form>
    </div>
<?php
    endif;
?>
