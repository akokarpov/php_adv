<?php

include 'SingletonDB.php';

function getImages() {
    $DB = DB::getDB();
    $connect = $DB->getConnect();
    $query = "select * from photos";
    $answer = mysqli_query($connect, $query);
    $images = [];
    while ($row = mysqli_fetch_assoc($answer)):
        array_push($images, $row);
    endwhile;
    return $images;
}

function updateImageCount($filename) {
    $DB = DB::getDB();
    $connect = $DB->getConnect();
    $query = "SELECT counter_views FROM photos WHERE filename='$filename'";
    $res = mysqli_query($connect, $query);
    $current_count = mysqli_fetch_array($res)[0];
    $query_count = "UPDATE photos SET counter_views = $current_count+1 WHERE filename='$filename'";
    mysqli_query($connect,$query_count);
    return $current_count;
}

?>