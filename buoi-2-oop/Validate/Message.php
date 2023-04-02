<?php

// include(__DIR__ . '/EmailValidate.php');

abstract class Message {
    abstract function passedValidate($fielName, $valueRule);
    abstract function getMessage($fielName);    
}   