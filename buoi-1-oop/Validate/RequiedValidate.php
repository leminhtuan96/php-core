<?php

// require(__DIR__ . '/Message.php');
// require __DIR__ . '/Message.php';
require_once __DIR__ . '/Message.php';


class RequiredValidate extends Message{

    private $fieldValue;
    public function __construct($fieldValue){
        $this->fieldValue = $fieldValue;
    }

    public function passedValidate(){
        if($this ->fieldValue){
            return true;
        }
        return false;
    }

    public function getMessage(){
        return ' not emply';
    }
}