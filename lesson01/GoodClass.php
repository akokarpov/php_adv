<?php

class Good {
    private $title;
    private $price;
    private $image;
    private $status;
    private $count;

    function __construct($title, $price, $image, $status, $count){
        $this->title = $title;
        $this->price = $price;
        $this->image = $image;
        $this->status = $status;
        $this->count = $count;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getPrice(){
        return $this->price;
    }

    function getImage(){
        return $this->image;
    }

    function getStatus(){
        return $this->status;
    }

    function getCount(){
        return $this->count;
    }

    function getTotal(){
        return $this->count * $this->price;
    }
}

?>