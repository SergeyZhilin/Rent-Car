<?php

namespace models;

use libs\DbConnect;

class Model
{
    /**
     * @var \PDO
     */
    protected $connection;

    /**
     * Model constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->connection = DbConnect::getConnect();

        if (!empty($data)) {

            $attributes = array_keys(get_object_vars($this));

            foreach ($data as $attribute => $value) {
                if(in_array($attribute, $attributes)) {
                    $this->$attribute = $value;
                }
            }
        }
    }
}