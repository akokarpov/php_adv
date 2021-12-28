<?php
    switch($_GET['page']){
        case '':
            include "pages/about_us.php";
            break;
        case 'catalog':
            include "pages/catalog.php";
            break;
        case 'item':
            include "pages/item.php";
            break;
        case 'auth':
            include "pages/auth.php";
            break;
        case 'cart':
            include "pages/cart.php";
            break;
        case 'exit':
            session_destroy();
            header("Location: /");
            break;
        case 'profile':
            include "pages/profile.php";
            break;
        case 'orders':
            include "pages/orders.php";
            break;
        case 'goods':
            include "pages/goods.php";
            break;
    }
?>