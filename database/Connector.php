<?php
    class Connection {
        private const BD_USERNAME = 'root';
        private const BD_PASSWORD = '';
        private const BD_HOST = 'localhost';
        private const BD_DATABASE = 'federacao_tenista';

        private static $conn;
        private function __construct() { }
        
        static function getConnection() {
            self::$conn = new PDO("mysql:host=" . self::BD_HOST . ";dbname=" . self::BD_DATABASE, self::BD_USERNAME, self::BD_PASSWORD);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        }

        function close($conexao){
            self::$conn = null;
        }
    }
   
    
?>