<?php
define('local', 'localhost');
define('db', 'bank');
define('user', 'root');
define('password', '12345');
define('DB_CHARSET', 'utf8mb4_general_ci');

class Connection
{
    public static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO(
                    'mysql:host=' . local . ';dbname=' . db,
                    user,
                    password,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4")
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            }
            return self::$instance;
        } catch (PDOException $e) {
            die("Error! Could not connect to database: " . $e->getMessage());
        }
    }
}
