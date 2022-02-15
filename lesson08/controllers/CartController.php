<?php

include 'BasePageController.php';
include 'models/CartModel.php';

class Cart extends BasePage {

    protected $title;
    protected $content;

    function __construct() {
        parent::__construct();
    }

    public function action_index($message=null) {
        $this->title = 'Корзина';
        $cart = new CartModel;
        $goodsInCart = $cart->getGoodsInCart();
        $this->content = $this->templater('views/cartView.php', array('goodsInCart' => $goodsInCart, 'message' => $message));
    }

    public function action_add() {
        $cart = new CartModel;
        $message = $cart->addGood((int)$_GET['id']);
        $this->action_index($message);
    }

    public function action_remove() {
        $cart = new CartModel;
        $cart->removeGood((int)$_GET['id']);
        $this->action_index();
    }

    public function action_updateCount() {
        $cart = new CartModel;
        $cart->updateCount();
    }

    public function action_delete() {
        $cart = new CartModel;
        $cart->deleteGood((int)$_GET['id']);
        $this->action_index();
    }

}

?>