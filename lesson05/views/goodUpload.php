<?=$message?>
<h1>Добавьте новый товар в каталог</h1><br>
<form action="?controller=catalog&action=add" method="post" enctype="multipart/form-data">
    <input type="text" placeholder='Название товара' name='title' required><br>
    <textarea name="spec" cols="20" rows="3" placeholder='Описание' required></textarea><br>
    <input type="number" placeholder='Цена' name='price' required><br>
    <input type="file" accept='image/*' name='photo' required><br><br>
    <input type="submit" value='Добавить'>
</form>