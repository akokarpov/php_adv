<?php
    include "./controllers/config.php";
    $goodsInCart = getGoodsInCart($connect);
    
    if($_GET['action']) {
        cartManager($connect, $_GET['goodId'], $_GET['action']);
        header('Location: /?page=cart');
    }
    if($_GET['order'] == 'place') {
        placeOrder($connect);           
    } elseif($_GET['order'] == 'done') {
        echo "<h1 style='color: darkgreen'>Заказ успешно оформлен!</h1>";
    }

    if($goodsInCart):?>
        <div>
        <?php
        $totalCart = 0;
        foreach($goodsInCart as $good):?>
            <p><strong>Товар:&nbsp;</strong><?=$good['title']?></p>
            <p><strong>Кол-во:&nbsp;</strong><?=$good['count']?></p>
            <p><strong>Цена:&nbsp;</strong><?=intval($good['sum'])/intval($good['count'])?></p>
            <p><strong>Итого:&nbsp;</strong><?=$good['sum']?></p>
            <a href="/?page=cart&goodId=<?=$good['goodId']?>&action=addCount"><button>+</button></a>
            <a href="/?page=cart&goodId=<?=$good['goodId']?>&action=remCount"><button>-</button></a>
            <a href="/?page=cart&goodId=<?=$good['goodId']?>&action=delGood"><button>Удалить</button></a>
            <br>
            <hr>
            <?php $totalCart += intval($good['sum']);?>
            <?
            endforeach;
            ?>
        <h1>Итого: <?=$totalCart?>&nbsp;&#8381;.</h1>
        <br>
        <a href="/?page=cart&order=place"><button>Сделать заказ</button></a>
        </div>
        <?
    endif;
?>
