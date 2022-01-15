<?php

const SERVER = "localhost";
const DB = "my_db";
const LOGIN = "root";
const PASS = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect = mysqli_connect(SERVER,LOGIN,PASS,DB);

?>