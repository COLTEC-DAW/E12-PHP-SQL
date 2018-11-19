<?php
class Connection {
    private static  $con;
    private function __construct() {}
    public static function connect() {

        if (!isset(self::$con)) {
            self::$con = new PDO("mysql:host=localhost:3306;dbname=federacao_tenis", "root", "starman2001");
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$con;
    }
}
?>
