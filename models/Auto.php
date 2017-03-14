<?php

namespace models;

use libs\DbConnect;

class Auto extends Model
{
    private $id;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $number = '';

    /**
     * @var int
     */
    public $mark_id;

    /**
     * @var int
     */
    public $price_id;

    /**
     * @var string
     */
    public $class;

    /**
     * @var string
     */
    public $body;

    /**
     * @var string
     */
    public $transmission;

    /**
     * @var int
     */
    public $color_id;

    /**
     * @var string
     */
    public $amount = '';
//    public $person_id;
//    public $begin_time_rent;
//    public $time_return;

    /**
     * @var Mark
     */
    private $mark;
    /**
     * @var Color
     */
    private $color;
    /**
     * @var Price
     */
    private $price;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Mark
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * @param Mark $mark
     */
    public function setMark(Mark $mark)
    {
        $this->mark = $mark;
    }

    /**
     * @return Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param Color $color
     */
    public function setColor(Color $color)
    {
        $this->color = $color;
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param Price $price
     */
    public function setPrice(Price $price)
    {
        $this->price = $price;
    }

    public static function getAll()
    {
        $query = "SELECT auto.*, mark.mark, price.price, person.name, person.surname, color.color 
                  FROM auto 
                    LEFT JOIN mark ON auto.mark_id = mark.id 
                    LEFT JOIN price ON auto.price_id = price.id 
                    LEFT JOIN color ON auto.color_id = color.id 
                    LEFT JOIN person ON auto.person_id = person.id";

        $coonection = DbConnect::getConnect();
        $rows = $coonection->query($query)->fetchAll(\PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            $auto = new self($row);
            $auto->id = $row['id'];
            $auto->mark = new Mark($row);
            $auto->price = new Price($row);
            $auto->color = new Color($row);
            $result[] = $auto;
        }

        return $result;
    }

    public static function get($id)
    {
        $query = "SELECT auto.*, mark.mark, price.price, person.name, person.surname, color.color 
                  FROM auto 
                    LEFT JOIN mark ON auto.mark_id = mark.id 
                    LEFT JOIN price ON auto.price_id = price.id 
                    LEFT JOIN color ON auto.color_id = color.id 
                    LEFT JOIN person ON auto.person_id = person.id 
                  WHERE auto.id = '{$id}'";

        $result = DbConnect::getConnect()->query($query);
        $result = $result->fetch(\PDO::FETCH_ASSOC);

        $model = new self($result);
        $model->id = $id;

        $model->mark = new Mark($result);
        $model->price = new Price($result);
        $model->color = new Color($result);

        return $model;
    }

    /**
     * @return array
     */
    public static function getTypes()
    {
        return ['auto' => 'Auto', 'moto' => 'Moto'];
    }

    /**
     * @return array
     */
    public static function getClasses()
    {
        return ['-','A', 'B', 'C', 'D', 'E', 'F', 'J', 'M', 'S'];
    }

    /**
     * @return array
     */
    public static function getBodies()
    {
        return ['Sedan','Universal', 'Hatchback', 'Jeep', 'Sport Bike', 'Chopper', 'Cruiser'];
    }

    /**
     * @return array
     */
    public static function getTransmissions()
    {
        return ['mechanic', 'automatic'];
    }

    public function save()
    {
        if(!$this->id) {
            $this->create();
        } else {
            $this->update();
        }
    }

    public function update()
    {
        $mark = new Mark(['mark' => $this->mark_id]);
        $color = new Color(['color' => $this->color_id]);
        $price = new Price(['price' => $this->price_id]);

        $this->mark_id = $mark->create()->id;
//        $this->color_id = $color->create()->id;
        $this->price_id = $price->create()->id;

        $sql = "UPDATE `auto` SET `type`='$this->type',`number`='$this->number',
                                  `mark_id`=$this->mark_id,`price_id`=$this->price_id,`class`='$this->class',
                                  `body`='$this->body',`transmission`='$this->transmission',`color_id`=$this->color_id,
                                  `amount`='$this->amount' 
                              WHERE id=$this->id";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute();
    }

    public function create()
    {
        $mark = new Mark(['mark' => $this->mark_id]);
//        $color = new Color(['color' => $this->color_id]);
        $price = new Price(['price' => $this->price_id]);

        $this->mark_id = $mark->create()->id;
//        $this->color_id = $color->create()->id;
        $this->price_id = $price->create()->id;

        $sql = "INSERT INTO auto (type, number, mark_id, price_id, class, body, transmission, color_id, amount) VALUES (";

        $sql .= "'{$this->type}', '{$this->number}', {$this->mark_id}, {$this->price_id}, '{$this->class}', ";
        $sql .= "'{$this->body}', '{$this->transmission}', {$this->color_id}, '{$this->amount}');";

        $this->connection->prepare($sql)->execute();

        $this->id = $this->connection->lastInsertId();

        return $this;
    }

    public function delete()
    {
        $sql = "DELETE FROM `auto` WHERE id = $this->id";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute();
    }
}