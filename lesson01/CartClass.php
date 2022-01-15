<?php

class Cart {
    private $addedGoods;
    private $likedGoods;
    private $totalGoodsPrice;
    
    function __constructor(){
        $this->addedGoods = [];
        $this->likedGoods = [];
        $this->totalGoodsPrice = 0;
    }

    function resetCart(){
        $this->addedGoods = [];
        $this->likedGoods = [];
        $this->totalGoodsPrice = 0;
    }

    function addGoodToCart($good){
        $this->addedGoods[] = $good;
    }

    function getTotalGoodsPrice(){
        foreach($this->addedGoods as $good){
            $this->totalGoodsPrice += $good->getPrice();
        }
        return $this->totalGoodsPrice;
    }

    function getGoodsInfo(){
        $goodsInfo = "";
        foreach($this->addedGoods as $good){
            $goodsInfo .= "<strong>Товар:</strong> {$good->getTitle()}<br>";
            $goodsInfo .= "<strong>Кол-во:</strong> {$good->getCount()}<br>";
            $goodsInfo .= "<strong>Цена:</strong> {$good->getPrice()}<br>";
            if($good->discountedPrice) {
                $goodsInfo .= "<strong>Итого (включая скидку {$good->getDiscount()}%):</strong> {$good->getDiscountedPrice()}<hr>";
            } else {
                $goodsInfo .= "<strong>Итого:</strong> {$good->getTotal()}<hr>";
            }
        }
        return $goodsInfo;
    }
}


?>