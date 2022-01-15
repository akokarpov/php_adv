<?php

class SpecialGood extends Good {
    private $discount;
    public $discountedPrice;

    function __construct($title, $price, $image, $status, $count, $discount){
        parent::__construct($title, $price, $image, $status, $count);
        $this->discount = $discount;
        $this->discountedPrice = true;
    }

    function getDiscountedPrice(){
        $this->discountedPrice = $this->getPrice() * $this->discount;
        return $this->discountedPrice;
    }

    function getDiscount(){
        return (1 - $this->discount) * 100;
    }

}

?>