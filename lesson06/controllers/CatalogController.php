<?php

include 'BasePageController.php';
include 'models/CatalogModel.php';

class Catalog extends BasePage {

    protected $title;
    protected $content;

    function __construct() {
        parent::__construct();
    }

    public function action_index($message=null) {
        $this->title = 'Каталог';
        $catalog = new CatalogModel;
        $goods = $catalog->getAllGoods();
        $this->content = $this->templater('views/catalogView.php', array('goods' => $goods,'message' => $message));
    }

    public function action_item() {
        $catalog = new CatalogModel;
        $good = $catalog->getOneGood((int)$_GET['id']);
        $this->title = $good['title'];
        $this->content = $this->templater('views/goodView.php', array('good' => $good));
    }

    public function action_add() {
        $catalog = new CatalogModel;
        if($_FILES && $_POST) {
            $catalog->addGood($_FILES, $_POST);
        }
        $message = ($_GET['message'] == 'added') ? "<h2 style='color: darkgreen'>Товар успешно добавлен в каталог!</h2><br>" : null;
        $this->title = 'Админ(Товары)';
        $this->content = $this->templater('views/goodUpload.php', array('message' => $message));
    }

    public function action_delete() {
        $catalog = new CatalogModel;
        $catalog->deleteGood((int)$_GET['id']);
        $this->action_index();
    }

    public function action_showMoreGoods() {
        $_SESSION['goodsLimit'] += 2;
        header('Location: /?controller=catalog&action=index');
    }

}

?>