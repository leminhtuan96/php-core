<?php

// require(__DIR__ . '/Message.php');
// require __DIR__ . '/Message.php';
require_once __DIR__ . '/Message.php';


class MinValidate extends Message{

    private $fieldValue;

    private $min;
    public function __construct($fieldValue, $min){
        $this->fieldValue = $fieldValue;
        $this->min = $min;
    }

    public function passedValidate(){
        if(strlen($this ->fieldValue) >= $this->min){
            return true;
        }
        return false;
    }

    public function getMessage(){
        return ' min characters';
    }
}