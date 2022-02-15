<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title><?=$title?></title>
</head>

<header>
    <span class="header">ИНТЕРНЕТ-МАГАЗИН</span>   
</header>

<body>

<main class="flexcontainer">        
        <section class="main-left">
            <?php include "menuView.php";?>
        </section>

        <section class="main-content">
            <?=$content?>
        </section>
</main>

<footer class="footer footer__container">
    <div class="footer">
        <ul>
            <li><a href="http://yandex.ru">Yandex</a></li>
            <li><a href="http://google.com">Google</a></li>
        </ul>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, saepe! Ad tenetur, non illo sunt consectetur, quae dolore doloribus quod tempora voluptates consequuntur debitis quas praesentium quibusdam ducimus quisquam vitae.</p>
        &copy; 2021 All rights reserved.
    </div>
</footer>

</body>
</html>