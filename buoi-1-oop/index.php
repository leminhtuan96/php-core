<?php

// //global

// $a = 10;

// function test($a) {
//     global $a;

// }
//   //  echo $GLOBALS($a);
//     echo 'sdsdsd',$a;

//libarari validate

$dataForm = [
    'name' => '',
    'email' => '',
    'first_name' => ''
];

$rules = [
    'name' => 'required|max:3',
    'email' => 'required|email',
    'first_name' => 'required|min:3'
];

// require(__DIR__ . '/ValidateService.php');
require(__DIR__ . '/ValidateService.php');


//innit data
$validate = new ValidateService($dataForm);
$validate->setRules($rules);

//validate
$validate->validate();
//get errors
echo '<pre>';
print_r($validate->getErrors());

// if ($validate->counErrors()) {
//     $errors = $validate->getErrors();
//     echo '<pre>';
//     print_r($errors);
// } else {
//     var_dump('submit form');
// }



// $errors = [];


// foreach ($rules as $field => $rule) {

//     $valueRule = $dataForm[$field];

//     //check rules xem co dau | nay khong
//     if(strpos($rule, '|')){
//         $ruleArray = explode('|', $rule);
//         foreach( $ruleArray as $ruleItem){

//             //check tim kiem dau : nay khong
//             if(strpos($rule, ':')){
//                 $ruleOptionnal = explode(':', $ruleItem);
//                 $functionValidate = $ruleOptionnal[0] . 'validate';
//                 $functionValidate($valueRule, $field, $ruleOptionnal[1]);
//             }else{
//                 $functionValidate = $ruleItem . 'validate';
                
//                 //function call calidate dymatic
//                 $functionValidate($valueRule, $field);
    
//             }
//         }
//         // print_r($ruleArray);
//     }else{
//     $functionValidate = $rule . 'validate';
//     // var_dump($field,$rule);
//     // echo'<hr/>';
//     //function call calidate dymatic
//     $functionValidate($valueRule, $field);
//     }
// }

// function emailValidate($valueRule, $fieldName)
// {
//     global $errors;

//     if (!filter_var($valueRule, FILTER_VALIDATE_EMAIL)) {
//         $errors[$fieldName][] = $fieldName . 'not format email';
//     }
// }

// function minValidate($valueRule, $fieldName, $min)
// {
//     global $errors;

//     if (strlen($valueRule) < $min) {
//         $errors[$fieldName][] = $fieldName . ' min ' . $min . ' characters';
//     }
// }

// function maxValidate($valueRule, $fieldName, $max)
// {
//     global $errors;

//     if (strlen($valueRule) > $max) {
//         $errors[$fieldName][] = $fieldName . ' max ' . $max . ' characters';
//     }
// }

// function requiredValidate($valueRule, $fieldName)
// {
//     global $errors;
//     // var_dump($valueRule,$fieldName);
//     if (!$valueRule) {
//         $errors[$fieldName][] = $fieldName . ' not empty';
//     }
// }

// echo '<pre>';
// print_r($errors);
