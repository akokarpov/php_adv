<?php

$menu = [
    "Главная"=>"/",
    "Каталог"=>"?page=catalog",
    // "Фото"=>"?page=gallery",
];

$menuNonAuthed = [
    "Войти"=>"?page=auth",
];

$menuAuthed = [
    "Корзина"=>"?page=cart",
    // "Отзывы" => "?page=feedback",
    "Личный кабинет"=>"?page=profile",
    "Выйти({$_SESSION['userName']})"=>"?page=exit",
];

$menuAdmin = [
    "Админ(Заказы)"=>"?page=orders",
    "Админ(Товары)"=>"?page=goods",
];

switch ($_SESSION['userId']) {
    case false:
        $menu = array_merge($menu, $menuNonAuthed);
        break;
    case true:
        if($_SESSION['admin']) {
            $menu = array_merge($menuAdmin, $menu, $menuAuthed);
        } else {
            $menu = array_merge($menu, $menuAuthed);
        }
        break;
};

$list = "<ul>";
foreach($menu as $title => $link):
    $list .= "<li><a class='menu-item-hover' title='$title' href='$link'>$title</li>";
endforeach;
$list .= "</ul>";

?>

<?=$list?>
<a href=""></a>