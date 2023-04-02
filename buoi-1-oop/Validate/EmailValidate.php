<?php

// require(__DIR__ . '/Message.php');
require_once __DIR__ . '/Message.php';

class EmailValidate extends Message
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function passedValidate()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function getMessage()
    {
        return ' format character';
    }
}
