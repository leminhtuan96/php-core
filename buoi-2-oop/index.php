<?php

$dataForm = [
    'name' => '',
    'email' => 'acbv@gmail.com'
];

$rules = [
    'name' =>
    [
        'required',
        'max:10'
    ],
    'email' =>
    [
        'required',
        'email',
        'min:3',
        'between:3,10',
        'required_with:name',
    ]
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
