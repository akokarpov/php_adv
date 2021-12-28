<?php

include "config.php";

// print_r($_FILES);
// print_r($_POST);

$goodPhotoName = $_FILES['photo']['name'];
$pathFullscale = "../img/{$goodPhotoName}";
$pathThumbnail = "../img/thumbnails/{$goodPhotoName}";

if(move_uploaded_file($_FILES['photo']['tmp_name'], $pathFullscale)) {

    // Set a maximum height and width
    $width = 200;
    $height = 200;

    // Content type
    header('Content-Type: image/jpeg');

    // Get new dimensions
    list($width_orig, $height_orig) = getimagesize($pathFullscale);

    $ratio_orig = $width_orig/$height_orig;

    if ($width/$height > $ratio_orig) {
    $width = $height*$ratio_orig;
    } else {
    $height = $width/$ratio_orig;
    }

    // Resample
    $image_p = imagecreatetruecolor($width, $height);
    $image = imagecreatefromjpeg($pathFullscale);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

    // Output
    imagejpeg($image_p, $pathThumbnail);
}

if($_GET['action'] == 'addNewGood') {
    $query = "INSERT INTO goods VALUES (id, '{$_POST['title']}', '{$goodPhotoName}', '{$_POST['spec']}', {$_POST['price']})";
    if(mysqli_query($connect,$query)) {
        header('Location: /?page=goods&action=goodAdded');
    }
}
?>