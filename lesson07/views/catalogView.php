<div claSs='flexcontainer catalog'>
    <?php
    if($goods) {
        foreach($goods as $good):?>
            <div class="catalog__item">
                <a href="?controller=catalog&action=item&id=<?=$good['id']?>"><img src="../img/thumbnails/<?=$good['image']?>" alt="<?=$good['image']?>"></a>
                <h4><a href="?controller=catalog&action=item&id=<?=$good['id']?>"><?=$good['title']?></a></h4>
                <p><?=$good['price']?>&nbsp;&#8381;</p>
                <a href="?controller=cart&action=add&id=<?=$good['id']?>"><button>Купить</button></a>
                <?php
                if($_SESSION['admin'] == true):
                ?>
                <a href="?controller=catalog&action=delete&id=<?=$good['id']?>"><button>Удалить из каталога</button></a>
                <?php
                endif;
                ?>
            </div>
        <?endforeach;
    }?>
</div>
<br>
<a href="?controller=catalog&action=showMoreGoods"><button>Показать еще товары...</button></a>