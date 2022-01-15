<?php

class DigitalGood extends Good {

    private static $price;

    function __construct($title, $price, $count) {
        parent::__construct($title, $price, $count);
    }
    
    public function getTitle() {
        return parent::getTitle();
    }

    public function getPrice() {
        $this->price = parent::getPrice() / 2;
        return $this->price;
    } 

    public function getCount() {
        return parent::getCount();
    } 

    public function getTotalSum() {
        return $this->price * parent::getCount();
    }
}

?>