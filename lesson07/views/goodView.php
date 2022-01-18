<div>
    <h1><?=$good['title']?></h1>
    <a href="../img/<?=$good['image']?>"><img src="../img/thumbnails/<?=$good['image']?>" alt="<?=$good['title']?>"></a>
    <h3>Описание товара:</h3>
    <p><?=$good['spec']?></p>
    <h3>Цена:</h3>
    <p><?=$good['price']?>&nbsp;&#8381;</p>
    <a href="?controller=cart&id=<?=$id?>&action=add" title="Добавить в корзину"><button>Купить</button></a>
</div>