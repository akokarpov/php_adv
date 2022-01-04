<?php

include 'AbstractPageController.php';

abstract class BasePage extends AbstractPage {
    
    protected $title;
    protected $content;


    function __construct() {
        $this->title = 'Название сайта';
        $this->content = '';
    }

    protected function doBeforeAction() {
        // $this->keyWords = '...';
    }

    public function render() {
        $vars = array('title' => $this->title, 'content' => $this->content);
        $page = $this->templater('views/mainView.php', $vars);
        echo $page;
    }
}

?>