<?php

// include(__DIR__ . '/EmailValidate.php');

abstract class Message {
    abstract function passedValidate();
    abstract function getMessage();    
}   