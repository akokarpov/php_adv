<?php
    echo $message;
    if($goodsInCart):
?>  
    <div>
    <?php
    $totalCart = 0;
    foreach($goodsInCart as $good):?>
        <p><strong>Товар:&nbsp;</strong><?=$good['title']?></p>
        <p><strong>Кол-во:&nbsp;</strong><?=$good['count']?></p>
        <p><strong>Цена:&nbsp;</strong><?=intval($good['sum'])/intval($good['count'])?></p>
        <p><strong>Итого:&nbsp;</strong><?=$good['sum']?></p>
        <a href="/?controller=cart&id=<?=$good['goodId']?>&action=add"><button>+</button></a>
        <a href="/?controller=cart&id=<?=$good['goodId']?>&action=remove"><button>-</button></a>
        <a href="/?controller=cart&id=<?=$good['goodId']?>&action=delete"><button>Удалить</button></a>
        <br>
        <hr>
        <?php $totalCart += intval($good['sum']);?>
    <?php
    endforeach;
    ?>
    <h1>Итого: <?=$totalCart?>&nbsp;&#8381;.</h1>
    <br>
    <a href="/?controller=cart&action=placeOrder"><button>Сделать заказ</button></a>
    </div>
<?php
    endif;
?>
