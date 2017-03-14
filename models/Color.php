<?php

namespace models;

use libs\DbConnect;

/**
 * Class Color
 * @package models
 */
class Color extends Model
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $color;

    /**
     * @return array
     */
    public static function getAll()
    {
        $coonection = DbConnect::getConnect();
        $rows = $coonection->query("SELECT * FROM color")->fetchAll(\PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            $result[] = new self($row);
        }

        return $result;
    }

    public function create() {
//        $sql = "INSERT INTO color (color) VALUES (" . '"' . $this->color . '"' . ")";
//        $this->connection->prepare($sql)->execute();
//
//        $this->id = $this->connection->lastInsertId();
//
//        return $this;
    }
}