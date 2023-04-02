<?php
require(__DIR__ . '/Valiadate/ReqiredValidate.php');
require(__DIR__ . '/Valiadate/EmailValidate.php');
require(__DIR__ . '/Valiadate/MinValidate.php');


class ValidateService {

    private $dataForm = [];

    private $rules = [];

    private $errors;

    public function __construct($dataForm){
        $this->dataForm = $dataForm;
    }

    public function setRules($rules) {
        $this->rules = $rules;
    }


    public function validate() {
        

        foreach($this->rules as $field => $rule) {     
            // get value field  
            $fieldValue = $this->dataForm[$field];

            if(strpos($rule, "|")) {
                $ruleArray = explode("|", $rule);
                foreach($ruleArray as $ruleItem) {
                    if(strpos($rule, ":")) {
                        $ruleOptional = explode(":", $ruleItem);
                        $classNameValidate = ucfirst($ruleOptional[0]) . 'Validate';
                        $instance = new $classNameValidate($fieldValue, $ruleOptional[1]);

                        // check validate by class
                        if(!$instance->passsedValidate()) {
                            $message = $field . $instance->getMessage();
                            // add to error
                            $this->errors[$field][] = $message;
                        }


                    } else {
                        $this->addErrorByInstance($ruleItem, $fieldValue, $field);
                    }
                    
                }

            } else {
                $this->addErrorByInstance($rule, $fieldValue, $field);
            }

        }

    }

    private function addErrorByInstance($ruleItem, $fieldValue, $field){
        $classNameValidate = ucfirst($ruleItem) . 'Validate';
        $instance = new $classNameValidate($fieldValue);

        // check validate by class
        if(!$instance->passsedValidate()) {
            $message = $field . $instance->getMessage();
            // add to error
            $this->errors[$field][] = $message;
        }
    }


    public function getErrors() {
        return $this->errors;
    }

    public function counErrors() {
        if(is_array($this->errors) && count($this->errors) > 0) {
            return true;
        }
        return false;
    }

   
}