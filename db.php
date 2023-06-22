<?php
//  INCLUDE
require __DIR__ . '/models/product.php';
require __DIR__ . '/models/category.php';
require __DIR__ . '/models/food.php';
require __DIR__ . '/models/toy.php';
require __DIR__ . '/models/kennel.php';

// DATA
$products = [
    new Kennel('Wooden House', 260, '/img/dogbigkennel.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), '', 'Medium', 'Black'),
    new Kennel('Calming Cat Bed', 36, '/img/catcomfybed.webp', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Trixie', '', 'White/Grey'),
    new Kennel('Comfy Cat Bed', 72, '/img/cathouse.avif', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Royal Canin', 'Regular', 'Eucalyptus'),
    new Kennel('Sleepdog Pillow Bed', 75, '/img/dogkennel.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), '', '', 'Gray'),
    new Toy('Squeaky Bone', 16, '/img/bonesToy.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Royal Canin', 'Puppy & Adult'),
    new Toy('Rabbit for Cat', 22, '/img/catrabbit.avif', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Paw Love', 'Adult & Puppy'),
    new Product('Blue Leash', 20, '/img/blue_leash.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('White Collar', 17, '/img/white_collar.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('Premium Pack', 30, '/img/premium_leash_collar.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('Velvet Gold Pack', 60, '/img/velvetPack.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Food('Virtus Salmon', 65, '/img/virtus_salmon.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Virtus', '7.5 KG', 'Adult All Breeds'),
    new Toy('Scratching Ball', 43, '/img/toy_cat.webp', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Trixie', 'Adult'),
    new Food('Virtus Kitten', 10, '/img/virtus-kitten.webp', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Virtus', '850 G', 'Puppy'),
];

// Set Kennel Products Proprerties to prevent php *uninitialized* value
$products[0]->setProductBrand('Paw Love');
$products[0]->setProductColor('Black');
$products[0]->setProductSize('Medium');

$products[1]->setProductBrand('Trixie');
$products[1]->setProductColor('White/Grey');
$products[1]->setProductSize('Small');

$products[2]->setProductBrand('Royal Canin');
$products[2]->setProductColor('Eucalyptus');
$products[2]->setProductSize('Regular');

$products[3]->setProductBrand('Royal Canin');
$products[3]->setProductColor('Gray');
$products[3]->setProductSize('XL Large');

// var_dump($products);

?>