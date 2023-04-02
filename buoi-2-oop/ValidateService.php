<?php

require(__DIR__ . '/Validate/RequiedValidate.php');
require(__DIR__ . '/Validate/EmailValidate.php');
require(__DIR__ . '/Validate/MinValidate.php');
require(__DIR__ . '/Validate/MaxValidate.php');
require(__DIR__ . '/Validate/BetweenValidate.php');
require(__DIR__ . '/Validate/QuiredValidate.php');

class ValidateService
{
    private $dataForm = [];
    private $rules = [];

    private $errors;

    private $message;

    private $ruleMapsClass = [
        'required' => RequiredValidate::class,
        'email' => EmailValidate::class,
        'min' => MinValidate::class,
        'between' => BetweenValidate::class,
        'required_with' => QuiredValidate::class,
        'max' => MaxValidate::class
    ];

    public function __construct($dataForm)
    {
        $this->dataForm = $dataForm;
    }

    public function setRules($rules)
    {
        foreach ($rules as $fielName => $fielRule) {
            $rules[$fielName] = explode('|', $fielRule);
        }
        $this->rules = $rules;
    }

    public function setMessages($message) {
        $this->message = $message;
    }


    public function validate()
    {
        // 1.chuan dau vao
        // 2.thuc hien validation   
        foreach ($this->rules as $fielName => $ruleArray) {

            $valueRule = $this->dataForm[$fielName];

            foreach ($ruleArray as $ruleItem) {
                // var_dump($fielName);
                // echo "<br />";
                // var_dump($ruleItem);
                // echo "<br/>";
                $ruleAndOptional = explode(':', $ruleItem);
                $ruleName = $ruleAndOptional[0];
                $optional = explode(',', end($ruleAndOptional));

                // echo "<pre>";
                // print_r($ruleAndOptional);
                $className = $this->ruleMapsClass[$ruleName];
                $classNameInstance = new $className(...$optional);
                if (!$classNameInstance->passedValidate($fielName, $valueRule, $this->dataForm)) 
                {
                    $keyMessage = $fielName . '.' . $ruleName;
                    var_dump($keyMessage);
                    $this->errors[$fielName][] = $classNameInstance->getMessage($fielName,$this->message[$keyMessage]??null);
                }
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function counErrors()
    {
        if (is_array($this->errors) && count($this->errors) > 0) {
            return true;
        }
        return false;
    }
}
