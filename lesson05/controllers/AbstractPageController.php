<?php

abstract class AbstractPage {

    abstract function render();

    public function request($action) {
        $this->doBeforeAction();
        $this->$action();
        $this->render();
    }

    protected function isGet() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    protected function templater($filename, $vars = array()) {
        foreach ($vars as $key => $value):
            $$key = $value;
        endforeach;
        ob_start();
        include "$filename";
        return ob_get_clean();
    }

    public function __call($name, $params) {
        die('Ошибочный вызов...!');
    }
}

?>