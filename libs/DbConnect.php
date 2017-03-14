<?php

namespace libs;

class DbConnect
{
    private static $db;

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    /**
     * DbConnect constructor.
     * @param $db_host
     * @param $db_name
     * @param $db_user
     * @param $db_pass
     */
    private function __construct($db_host, $db_name, $db_user, $db_pass)
    {
        try {
            $this->conn = new \PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            // set the PDO error mode to exception
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    /**
     * @return \PDO
     */
    public static function getConnect()
    {
        if (!self::$db) {
            self::$db = new self("localhost", "rentcar", "root", "");
        }
        return self::$db->conn;
    }
}