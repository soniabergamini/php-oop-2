<?php
//  INCLUDE
require __DIR__ . '/models/product.php';
require __DIR__ . '/models/category.php';

// DATA
$products = [
    new Product('Leash', 20 , new Category('Dog', 'Special Products for Special Dogs')),
];

var_dump($products)

?>