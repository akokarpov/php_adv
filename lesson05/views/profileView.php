<h2 style='color: darkgreen'><?=$_SESSION['userName']?>, это — ваш личный кабинет.</h2>
<br>
<p><strong>Вы недавно смотрели:</strong></p>
<br>
<ol>
    <?php for ($i=count($_SESSION['visitedPages'])-1; $i > count($_SESSION['visitedPages'])-6; $i--):?>
        <li><?=$_SESSION['visitedPages'][$i]?></li>
    <?php endfor;?>
</ol>