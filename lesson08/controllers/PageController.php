<?php

include 'BasePageController.php';

class Page extends BasePage {

    protected $title;
    protected $content;

    function __construct() {
        parent::__construct();
    }

    public function action_index() {
        $this->title = 'Главная страница';
        $this->content = $this->templater('views/aboutUsView.php');
    }
    
}

?>