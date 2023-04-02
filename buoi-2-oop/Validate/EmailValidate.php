<?php

// require(__DIR__ . '/Message.php');
//require_once __DIR__ . '/Message.php';

class EmailValidate
{
    public function passedValidate($fielName, $valueRule, $dataForm)
    {
        if ($valueRule) {
            return true;
        }
        return false;
    }

    public function getMessage($fielName)
    {
        return $fielName . ' format character';
    }
}
