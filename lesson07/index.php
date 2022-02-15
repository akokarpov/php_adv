<?php

session_start();
include 'models/commonModel.php';
spl_autoload_register('myAutoloader');

$action = 'action_';
$action .= (isset($_GET['action'])) ? $_GET['action'] : 'index'; 

switch ($_GET['controller']) {
    case 'page':
        $controller = new Page;
        $pageName = "Главная страница";
        $link = "index.php?controller=page&action=index";
        break;
    case 'catalog':
        $controller = new Catalog;
        $pageName = "Каталог товаров";
        $link = "index.php?controller=catalog&action=index";
        break;
    case 'user':
        $controller = new User;
        $pageName = "Личный кабинет";
        $link = "index.php?controller=user&action=profile";
        break;
    case 'cart':
        $controller = new Cart;
        $pageName = "Корзина";
        $link = "index.php?controller=cart&action=index";
        break;
    case 'order':
        $controller = new Order;
        $pageName = "Заказы";
        $link = "index.php?controller=orders&action=index";
        break;
    default:
        $controller = new Page;
        $pageName = "Главная страница";
        $link = "index.php?controller=page&action=index";
        break;
}

//track last visited page
if ($_GET['action'] == 'index') {
    $_SESSION['visitedPages'][] = "<a class='menu-item-hover' href='$link'>$pageName</a>";
}

$controller->request($action);

?>