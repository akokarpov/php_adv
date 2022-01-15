<?php

trait mySql {
    static function returnMySqlCredentials() {
        define('SERVER', "localhost");
        define('DB', "my_db");
        define('LOGIN', "root");
        define('PASS', "");
    }
}

class DB {

    use mySql;
    protected static $DB;
    protected static $connect;
    
    private function __construct(){
        mySql::returnMySqlCredentials();
        DB::$connect = mysqli_connect(SERVER,LOGIN,PASS,DB);
    }

    public static function getDB(){
        if(self::$DB === null) {
            self::$DB = new self;  
        }
        return self::$DB;
    }

    public static function getConnect(){
        return DB::$connect;
    } 
}

?>