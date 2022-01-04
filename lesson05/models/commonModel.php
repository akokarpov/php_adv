<?php

function myAutoloader($class) {
    include 'controllers/' . $class . 'Controller.php';
}

?>