<?php

$currentUrl = trim("$_SERVER[REQUEST_URI]", "/");

$menu = [
    "Главная"=>"?controller=page&action=index",
    "Каталог"=>"?controller=catalog&action=index",
];

$menuNonAuthed = [
    "Войти"=>"?controller=user&action=auth",
];

$menuAuthed = [
    "Корзина"=>"?controller=cart&action=index",
    "Личный кабинет"=>"?controller=user&action=profile",
    "Выйти({$_SESSION['userName']})"=>"?controller=user&action=logout",
];

$menuAdmin = [
    "Заказы (админ)"=>"?controller=order&action=index",
    "Товары (админ)"=>"?controller=catalog&action=edit",
    "Новый товар"=>"?controller=catalog&action=add",
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
    $active = ($currentUrl == $link) ? "menu-active" : "";
    $list .= "<li><a class='menu-item-hover $active' title='$title' href='$link'>$title</li>";
endforeach;
$list .= "</ul>";

?>

<?=$list?>
<a href=""></a>