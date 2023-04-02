<?php

// require(__DIR__ . '/Message.php');
// require __DIR__ . '/Message.php';
// require_once __DIR__ . '/Message.php';

class BetweenValidate
{
    private $min;
    private $max;

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }


    public function passedValidate($fielName, $valueRule, $dataForm)
    {
        if (strlen($this->min) <= $valueRule && strlen($this->max) >= $valueRule) {
            return true;
        }
        return false;
    }

    public function getMessage($fielName)
    {
        return $fielName . ' must between' . $this->min . ' and' . $this->max . ' character';
    }
}
