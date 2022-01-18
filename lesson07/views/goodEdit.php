<?=$message?>
<h1 style='color: darkgreen'>Редактировать товары</h1><br>
<table>
    <tr>
        <th>Товар</th>
        <th>Описание</th>
        <th>Фото</th>
        <th>Цена</th>
        <th>Сохранить</th>
    </tr>
<?php foreach ($goods as $good):?>
    <form action="?controller=catalog&action=edit" method="post">
    <input type="hidden" name="id" value="<?=$good['id']?>">
    <tr>
        <td>
            <input type="text" name='title' value="<?=$good['title']?>">
        </td>
        <td>
            <textarea name="spec" cols="50" rows="10"><?=$good['spec']?></textarea>
        </td>
        <td>
            <input type="text" name='photo' value="<?=$good['image']?>">
        </td>
        <td>
            <input type="number" name='price' value="<?=$good['price']?>">
        </td>
        <td>
            <input type="submit" value='OK'>
        </td>    
    </tr>
    </form>
<?php endforeach?>
</table>