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

$DB = DB::getDB();
$connect = $DB->getConnect();

$sqlQuery = "SELECT * from cart";
    $answer = mysqli_query($connect, $sqlQuery);
    if(!$answer) {
        die(mysqli_error($connect));
    }
    while($data = mysqli_fetch_assoc($answer)) {
        $goodsInCart[] = $data;
    }
print_r($goodsInCart);
?>