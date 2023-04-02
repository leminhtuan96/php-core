<?php

// require(__DIR__ . '/Message.php');
// require __DIR__ . '/Message.php';
// require_once __DIR__ . '/Message.php';


class RequiredValidate
{


    public function passedValidate($fielName, $valueRule, $dataForm)
    {
        if ($valueRule) {
            return true;
        }
        return false;
    }

    public function getMessage($fielName,$message)
    {
        if ($message)
        {
            return $message;
        }
        return $fielName . ' not emply';
    }
}
