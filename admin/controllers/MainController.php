<?php

namespace admin\controllers;

use models\Auto;
use models\Color;
use models\Mark;
use models\Price;
use validators\AutoValidator;

class MainController
{
    public function indexAction()
    {
        require('../index.html');
    }

    public function createAction()
    {
        $auto = new Auto();

        $auto->setMark(new Mark());
        $auto->setPrice(new Price());
        $auto->setColor(new Color());

        $colors = Color::getAll();
        $types = Auto::getTypes();
        $classes = Auto::getClasses();
        $bodys = Auto::getBodies();
        $transmissions = Auto::getTransmissions();

        $rules = ['mark_id' => 'required',
                  'number' => 'required',
                  'amount' => 'required',
                  'price_id' => 'required'];
        $validator = new AutoValidator($_POST, $rules);
        if ($validator->validate()) {
            $this->setData($auto);
        }
        require('views/create.php');
    }

    public function editAction()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        if (!$id) {
            die("Значение ID пустое");
        }

        $auto = Auto::get($id);

        $this->setData($auto);

        $colors = Color::getAll();
        $types = Auto::getTypes();
        $classes = Auto::getClasses();
        $bodys = Auto::getBodies();
        $transmissions = Auto::getTransmissions();

        require('views/editform.php');
    }

    private function setData(Auto $model)
    {
        $needUpdate = false;

        /*
         * get_object_vars -- Возвращает ассоциативный массив свойств и значений объекта
         */


        $attributes = get_object_vars($model);
        foreach ($attributes as $attribute => $value) {
            if (isset($_POST[$attribute])) {
                $model->$attribute = $_POST[$attribute];
                $needUpdate = true;
            }
        }

        if ($needUpdate) {
            $model->save();

            header('Location: /main/admin', true, 302);
        }
    }
    public function deleteAction()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : false;
        if (!$id) {
            die("Значение ID пустое");
        }
        $auto = Auto::get($id);

        $auto->delete();

        header('Location: /main/admin', true, 302);
    }
    public function adminAction()
    {
        $autos = Auto::getAll();
        require ('/views/admin.php');
    }
}