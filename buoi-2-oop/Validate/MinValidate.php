<?php

// require(__DIR__ . '/Message.php');
// require __DIR__ . '/Message.php';
// require_once __DIR__ . '/Message.php';

class MinValidate {
    private $min;

    public function __construct($min) {
        $this->min = $min;
    }


    public function passedValidate($fielName, $valueRule)
    {
        if(strlen($this->min)<= $valueRule)
        {
            return true;
        }
        return false;
    }

    public function getMessage($fielName){
        return $fielName . ' min characters' . $this->min . ' characters';
    }
}