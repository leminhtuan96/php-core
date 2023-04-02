<?php

// require(__DIR__ . '/Message.php');
// require __DIR__ . '/Message.php';
// require_once __DIR__ . '/Message.php';

class QuiredValidate
{
    private $fielNameRequiredWith;

    public function __construct($fielNameRequiredWith)
    {
        $this->fielNameRequiredWith = $fielNameRequiredWith;
    }


    public function passedValidate($fielName, $valueRule, $dataForm)
    {
        if ($valueRule && !$dataForm[$this->fielNameRequiredWith]) {
            return false;
        }
        return true;
    }

    public function getMessage($fielName)
    {
        return 'required with name';
    }
}
