<?php

class Connection {
    private static  $con;

    private function __construct() {}

    public static function getConnection() {
        
        if (!isset(self::$con)) {
            // $json = json_decode(file_get_contents('./config.json'), true);
            // self::$con = new PDO("mysql:host=" . $json["host"] . "; dbname=" . $json["bd"], $json["username"], $json["password"]); 
            self::$con = new PDO("mysql:host=localhost:3306;dbname=federacao_tenis", "root", "");
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        } 

        return self::$con;
    }
}

?>