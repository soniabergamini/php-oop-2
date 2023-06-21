<?php
//  INCLUDE
require __DIR__ . '/models/product.php';
require __DIR__ . '/models/category.php';
require __DIR__ . '/models/food.php';
require __DIR__ . '/models/toy.php';

// DATA
$products = [
    new Toy('Squeaky Bone', 16, '/img/bonesToy.avif', new Category('dog', 'We love our Kittens', '/img/cat.png'), 'Royal Canin', 'Puppy & Adult'),
    new Product('Blue Leash', 20, '/img/blue_leash.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('White Collar', 17, '/img/white_collar.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('Premium Pack', 30, '/img/premium_leash_collar.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('Velvet Gold Pack', 60, '/img/velvetPack.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Food('Virtus Salmon', 65, '/img/virtus_salmon.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Virtus', '7.5 KG', 'Adult All Breeds'),
    new Food('Virtus Kitten', 10, '/img/virtus-kitten.webp', new Category('cat', 'We love our Kittens', '/img/cat.png'), 'Virtus', '850 G', 'Puppy'),
    new Toy('Scratching Ball', 43, '/img/toy_cat.webp', new Category('cat', 'We love our Kittens', '/img/cat.png'), 'Trixie', 'Adult'),
];

var_dump($products)

?>