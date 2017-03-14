<?php

namespace models;


class Price extends Model
{
    public $id;
    public $price;

    public function create()
    {
        $sql = "INSERT INTO price (price) VALUES (" . '"' . $this->price . '"' . ")";
        $this->connection->prepare($sql)->execute();

        $this->id = $this->connection->lastInsertId();

        return $this;
    }
}