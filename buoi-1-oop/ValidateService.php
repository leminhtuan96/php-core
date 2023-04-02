<?php

require(__DIR__ . '/Validate/RequiedValidate.php');
require(__DIR__ . '/Validate/EmailValidate.php');
require(__DIR__ . '/Validate/MinValidate.php');
require(__DIR__ . '/Validate/MaxValidate.php');

class ValidateService
{
    private $dataForm = [];
    private $rules = [];

    private $errors;

    public function __construct($dataForm)
    {
        $this->dataForm = $dataForm;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }


    public function validate()
    {
        foreach ($this->rules as $field => $rule) {
            $fieldValue = $this->dataForm[$field];
            if (strpos($rule, '|')) {
                $ruleArray = explode('|', $rule);

                foreach ($ruleArray as $ruleItem) {
                    if (strpos($rule, ':')) {
                        $ruleOptionnal = explode(':', $ruleItem);
                        $classNameValidate = ucfirst($ruleOptionnal[0]) . 'Validate';
                        $instance =  new $classNameValidate($fieldValue, $ruleOptionnal[1]);
                        //check tim kiem dau : nay khong
                        // var_dump($instance->passedValidate());
                        if (!$instance->passedValidate()) {
                            $message = $field . $instance->getMessage();
                            $this->errors[$field][] = $message;
                        }
                    } else {
                        $classNameValidate = ucfirst($ruleItem) . 'Validate';
                        $instance =  new $classNameValidate($fieldValue);
                        if (!$instance->passedValidate()) {
                            $message = $field . $instance->getMessage();
                            $this->errors[$field][] = $message;
                        }
                    }
                }
            } else {
                $classNameValidate = ucfirst($rule) . 'Validate';
                $instance =  new $classNameValidate($fieldValue);
                if (!$instance->passedValidate()) {
                    $message = $field . $instance->getMessage();
                    $this->errors[$field][] = $message;
                }
            }
        }
    }

    // public function emailValidate($valueRule, $fieldName)
    // {
    //     if (!filter_var($valueRule, FILTER_VALIDATE_EMAIL)) {
    //         $this->errors[$fieldName][] = $fieldName . 'not format email';
    //     }
    // }

    // public function requiredValidate($valueRule, $fieldName)
    // {
    //     if (!$valueRule) {
    //         $this->errors[$fieldName][] = $fieldName . ' not empty';
    //     }
    // }
    // public function minValidate($valueRule, $fieldName, $min)
    // {
    //     if (strlen($valueRule) < $min) {
    //         $this->errors[$fieldName][] = $fieldName . ' min ' . $min . ' characters';
    //     }
    // }

    // public function maxValidate($valueRule, $fieldName, $max)
    // {
    //     if (strlen($valueRule) > $max) {
    //         $this->errors[$fieldName][] = $fieldName . ' max ' . $max . ' characters';
    //     }
    // }


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
