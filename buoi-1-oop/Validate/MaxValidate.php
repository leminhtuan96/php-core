<?php

// require(__DIR__ . '/Message.php');
// require __DIR__ . '/Message.php';
require_once __DIR__ . '/Message.php';


class MaxValidate extends Message{

    private $fieldValue;

    private $max;
    public function __construct($fieldValue, $max){
        $this->fieldValue = $fieldValue;
        $this->max = $max;
    }

    public function passedValidate(){
        if(strlen($this ->fieldValue) <= $this->max){
            return true;
        }
        return false;
    }

    public function getMessage(){
        return ' max characters';
    }
}