<?php

namespace models;


class Mark extends Model
{
    public $id;
    public $mark = '';

    public function create()
    {
        $sql = "INSERT INTO mark (mark) VALUES (" . '"' . $this->mark . '"' . ")";
        $this->connection->prepare($sql)->execute();

        $this->id = $this->connection->lastInsertId();

        return $this;
    }

}