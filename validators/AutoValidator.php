<?php
namespace validators;

class AutoValidator
{
    private $data;
    public $rules;

    public $errors = [];

    public function __construct($data = [], $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate()
    {
        foreach ($this->rules as $attribute => $rule) {
            if (isset($this->data[$attribute])) {
                switch ($rule) {
                    case "required":
                        if (empty($this->data[$attribute])) {
                            $this->addError($attribute, "Это поле не может быть пустым");
                        }
                        break;
                }
            }
        }

        return count($this->errors) == 0;
    }

    private function addError($atribute, $massage)
    {
        $this->errors[$atribute] = $massage;
    }

    /**
     * @return bool | string
     */
    public function getError($atribute)
    {
        return isset($this->errors[$atribute]) ? $this->errors[$atribute] : false;
    }
}