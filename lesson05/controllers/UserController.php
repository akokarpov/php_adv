<?php

include 'BasePageController.php';
include 'models/UserModel.php';

class User extends BasePage {

    protected $title;
    protected $content;

    function __construct() {
        parent::__construct();
    }
    
    public function action_auth() {
        $this->title = 'Авторизация';
        $user = new UserModel;
        $message = !empty($_POST) ? $user->auth($_POST) : null;
        $this->content = $this->templater('views/authView.php', array('message' => $message));
    }

    public function action_profile() {
        $this->title = 'Личный кабинет';
        $this->content = $this->templater('views/profileView.php');
    }

    public function action_logout() {
        session_destroy();
        header("Location: index.php?controller=page&action=index");
    }


}

?>