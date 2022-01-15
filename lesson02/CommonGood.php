<?php

class CommonGood extends Good {

    function __construct($title, $price, $count) {
        parent::__construct($title, $price, $count);
    }
    
    public function getTitle() {
        return parent::getTitle();
    }

    public function getPrice() {
        return parent::getPrice();
    } 

    public function getCount() {
        return parent::getCount();
    } 

    public function getTotalSum() {
        return parent::getPrice() * parent::getCount();
    }
}

?>