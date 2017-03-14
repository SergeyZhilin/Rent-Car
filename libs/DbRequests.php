<?php

namespace libs;

class DbRequests
{
    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllAutos(){
        $result =$this->connection->query("SELECT auto.*, mark.mark, price.price, person.name, person.surname, color.color FROM auto 
                                           LEFT JOIN mark ON auto.mark_id = mark.id 
                                           LEFT JOIN price ON auto.price_id = price.id 
                                           LEFT JOIN color ON auto.color_id = color.id 
                                           LEFT JOIN person ON auto.person_id = person.id");
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getColors(){
        $result =$this->connection->query("SELECT * FROM color");
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getMark($atitle){
        $result =$this->connection->query("SELECT * FROM mark WHERE mark='{$atitle}'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function setMark($atitle){
        $sql = "INSERT INTO mark (mark) VALUE ('{$atitle}')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $this->getMark($atitle);
    }
    public function getPrice($aprice) {
        $result =$this->connection->query("SELECT * FROM price WHERE price='{$aprice}'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function setPrice($aprice) {
        $sql = "INSERT INTO price (price) VALUE ('{$aprice}')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $this->getPrice($aprice);
    }

    public function setAuto($auto) {
        $sql = "INSERT INTO auto (type, number, mark_id, price_id, class, body, transmission, color_id, amount) 
            VALUES ('{$auto['type']}','{$auto['number']}','{$auto['mark_id']}', '{$auto['price_id']}', '{$auto['class']}',
                    '{$auto['body']}', '{$auto['transmission']}', '{$auto['color_id']}', '{$auto['amount']}')";
        $stmt = $this->connection->prepare($sql);
        if ($stmt->execute()){
            return true;
        }

        return false;
    }
    public function getAutoByNumber($number) {
        $result =$this->connection->query("SELECT * FROM auto WHERE number ='{$number}'");
        return $result->fetch();
    }
    public function updateMark($mark, $id) {

    $sql = "UPDATE mark SET mark='$mark' WHERE id = '$id'";
        $stmt = $this->connection->prepare($sql);
        if ($stmt->execute()){
            return true;
        }

        return false;
    }
    public function updatePrice($price, $id){
        $sql = "UPDATE Price SET price='$price' WHERE id = '$id'";
        $stmt = $this->connection->prepare($sql);
        if ($stmt->execute()){
            return true;
        }

        return false;
    }
    public function findAuto($id){
        $result = $this->connection->query("SELECT auto.*, mark.mark, price.price, person.name, person.surname, color.color FROM auto 
                                           LEFT JOIN mark ON auto.mark_id = mark.id 
                                           LEFT JOIN price ON auto.price_id = price.id 
                                           LEFT JOIN color ON auto.color_id = color.id 
                                           LEFT JOIN person ON auto.person_id = person.id WHERE auto.id = '{$id}'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function getType($type){
        $result = $this->connection->query("SELECT * FROM auto WHERE type = '{$type}'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function UpId($id){
        $sql = "UPDATE mark SET mark = 'mark' WHERE id = '{$id}' ";
        $stmt = $this->connection->prepare($sql);
        if ($stmt->execute()){
            return true;
    }
  }
    public function UpMark($id, $atitle){

        $sql = "UPDATE `mark` SET `mark`='$atitle' WHERE id = '{$id}' ";
        $stmt = $this->connection->prepare($sql);
        if ($stmt->execute()){
            return true;
        }
    }
}
$request = new DbRequests(DbConnect::getConnect());