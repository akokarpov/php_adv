<?php

abstract class Good {

    private $title;
    private $price;
    private $count;
    private $totalSum = 0;

    function __construct($title, $price, $count) {
        $this->title = $title;
        $this->price = $price;
        $this->count = $count;
    }

    function __toString() {
        return $this->title;
    }

    function getTitle(){
        return $this->title;
    }

    function getPrice(){
        return $this->price;
    }

    function getCount(){
        return $this->count;
    }

    abstract function getTotalSum();
}

?>