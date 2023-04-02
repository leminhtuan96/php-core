<?php
require(__DIR__ . '/Products.php');

$productModel = new Products();
$productModel->create([
    'name' => "san pham",
    'description' => "hello world",
    'price' => 200
]);

// echo '<bre/>';
// print_r($productModel);
