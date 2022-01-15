<?php

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
    "Админ(Заказы)"=>"?controller=order&action=index",
    "Админ(Товары)"=>"?controller=catalog&action=add",
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