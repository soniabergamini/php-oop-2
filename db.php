<?php
//  INCLUDE
require __DIR__ . '/models/product.php';
require __DIR__ . '/models/category.php';

// DATA
$products = [
    new Product('Blue Leash', 20, '/img/blue_leash.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('White Collar', 17, '/img/white_collar.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('Premium Pack', 30, '/img/premium_leash_collar.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('Velvet Gold Pack', 60, '/img/velvetPack.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
];

var_dump($products)

?>