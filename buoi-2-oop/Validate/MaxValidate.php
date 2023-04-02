<?php

// require(__DIR__ . '/Message.php');
// require __DIR__ . '/Message.php';
// require_once __DIR__ . '/Message.php';


class MaxValidate
{
    private $max;

    public function __construct($max)
    {
        $this->max = $max;
    }
    public function passedValidate($fielName, $valueRule, $dataForm)
    {
        if (strlen($this->max) >= $valueRule) {
            return true;
        }
        return false;
    }

    public function getMessage($fielName)
    {
        return $fielName . ' max ' . $this->max . ' characters';
    }
}
