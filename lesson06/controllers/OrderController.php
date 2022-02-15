<?php

include 'BasePageController.php';
include 'models/OrderModel.php';

class Order extends BasePage {

    protected $title;
    protected $content;

    function __construct() {
        parent::__construct();
    }

    public function action_index($message=null) {
        $this->title = 'Заказы';
        $order = new OrderModel;
        $listOfOrders = $order->get();
        $this->content = $this->templater('views/orderView.php', array('orders' => $listOfOrders, 'message' => $message));
    }

    public function action_new() {
        $order = new OrderModel;
        $order->new();
    }

    public function action_status() {
        $order = new OrderModel;
        $order->status();
    }

}

?>