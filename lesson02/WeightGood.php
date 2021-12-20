<?php

class WeightGood extends Good {

    private $discount = 1;

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
        $count = parent::getCount();
        switch ($count) {
            case ($count >= 50 && $count <= 99):
                $this->discount = 0.8;
                break;
            case ($count >= 100):
                $this->discount = 0.5;
                break;
            default:
                $this->discount = 1;
                break;
        }
        return parent::getCount();
    } 
    
    public function getTotalSum() {
        return parent::getPrice() * parent::getCount() * $this->discount;
    }
}

?>