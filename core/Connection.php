<?php

class Connection {
    private $host = '127.0.0.1';
    private $dbname = 'me-food';
    private $username = 'root';
    private $password = '';
    private static $instance = null, $conn = null;

    private function __construct() {
        try {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ];

            $connect = new PDO($dsn, $this->username, $this->password, $options);

            self::$conn = $connect;
        }catch (PDOException $e) {
            echo 'Connection Error: '.$e->getMessage();
            die();
        }
    }

    public static function getInstance() {
        if(self::$instance == null) {
            $connection = new Connection();
            self::$instance = self::$conn;
        }

        return self::$instance;
    }
}