<?php

include 'models/DBModel.php';

class CatalogModel {

    function getAllGoods() {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = "select * from goods order by id desc limit {$_SESSION['goodsLimit']}";
        $response = mysqli_query($connect, $query);
        $allGoods = mysqli_fetch_all($response, MYSQLI_ASSOC);
        return $allGoods;
    }

    function getOneGood($goodId) {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = sprintf("select * from goods where id=%d", $goodId);
        $response = mysqli_query($connect, $query);
        $good = mysqli_fetch_assoc($response); 
        return $good;
    }

    function addGood($files, $post) {
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $goodPhotoName = $files['photo']['name'];
        $pathFullscale = "img/{$goodPhotoName}";
        $pathThumbnail = "img/thumbnails/{$goodPhotoName}";

        if(move_uploaded_file($files['photo']['tmp_name'], $pathFullscale)) {

            $width = 200;
            $height = 200;

            header('Content-Type: image/jpeg');

            list($width_orig, $height_orig) = getimagesize($pathFullscale);
            $ratio_orig = $width_orig/$height_orig;

            if ($width/$height > $ratio_orig) {
            $width = $height*$ratio_orig;
            } else {
            $height = $width/$ratio_orig;
            }

            $image_p = imagecreatetruecolor($width, $height);
            $image = imagecreatefromjpeg($pathFullscale);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
            imagejpeg($image_p, $pathThumbnail);
        }
        
        $query = "INSERT INTO goods VALUES (id, '{$post['title']}', '{$goodPhotoName}', '{$post['spec']}', {$post['price']})";
        if(mysqli_query($connect, $query)) {
            header('Location: /?controller=catalog&action=add&message=added');
        }
    }

    function deleteGood($goodId) {
        //Нужно найти как PHP удаляет фотки с HDD
        $DB = DB::getDB();
        $connect = $DB->getConnect();
        $query = "delete from goods where id = $goodId";
        mysqli_query($connect, $query);
    }
}

?>