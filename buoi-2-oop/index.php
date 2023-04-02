<?php

$dataForm = [
    'name' => '',
    'email' => ''
];

// $rules = [
//     'name' =>
//     [
//         'required',
//         'max:10'
//     ],
//     'email' =>
//     [
//         'required',
//         'email',
//         'min:3',
//         'between:3,10',
//         'required_with:name',
//     ]
// ];

$rules = [
    'name' => 'required',
    'email' => 'required|email|min:3|between:3,10|required_with:name'
];

$message = [
'name.required' =>'ban bat buoc nhap ten',
'email.required' =>'ban bat buoc nhap email',
'email.email' =>'ban hay nhap dung email',
'email.min' =>'ban nhap toi thieu 3 ky tu',
'email.betwen' =>'ban hay nhap toi thieu 3 ky tu va toi da 10 ky tu',
'email.required_with' =>'ban hay nhap name'
];

// require(__DIR__ . '/ValidateService.php');
require(__DIR__ . '/ValidateService.php');
//innit data
$validate = new ValidateService($dataForm);
$validate->setRules($rules);
$validate->setMessages($message);

//validate
$validate->validate();
//get errors
echo '<pre>';
print_r($validate->getErrors());
