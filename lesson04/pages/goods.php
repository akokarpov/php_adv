<?php
if($_GET['action'] == 'goodAdded'){
    echo "<h2 style='color: darkgreen'>Новый товар {$_GET['newGoodTitle']} успешно добавлен в каталог!</h2>";
}
?>

<h1>Добавить новый товар в каталог</h1><br>
<form action="./controllers/good.php?action=addNewGood" method="post" enctype="multipart/form-data">
    <input type="text" placeholder='Название товара' name='title' required><br>
    <textarea name="spec" cols="20" rows="3" placeholder='Описание' required></textarea><br>
    <input type="number" placeholder='Цена' name='price' required><br>
    <input type="file" accept='image/*' name='photo' required><br><br>
    <input type="submit" value='Добавить'>
</form>