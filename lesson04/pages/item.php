<?php
    include "./controllers/config.php";
    if($_GET['id']) {
        $id = (int)$_GET['id'];
    }
    $good = goodGet($connect, $id);
    if($_GET['action']) {
        $message = cartManager($connect, $_GET['id'], $_GET['action']);
        echo $message;
    }
?>

<div>
    <h1><?=$good['title']?></h1>
    <a href="../img/<?=$good['image']?>"><img src="../img/thumbnails/<?=$good['image']?>" alt="<?=$good['title']?>"></a>
    <h3>Описание товара:</h3>
    <p><?=$good['spec']?></p>
    <h3>Цена:</h3>
    <p><?=$good['price']?>&nbsp;&#8381;</p>
    <a href="/?page=item&id=<?=$id?>&action=addGood" title="Добавить в корзину"><button>Купить</button></a>
</div>