<?php

// require(__DIR__ . '/Message.php');
// require __DIR__ . '/Message.php';
// require_once __DIR__ . '/Message.php';


class RequiredValidate{


    public function passedValidate($fielName, $valueRule){
        if($valueRule){
            return true;
        }
        return false;
    }

    public function getMessage($fielName){
        return $fielName . ' not emply';
    }
}