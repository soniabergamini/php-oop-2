<?php
//  INCLUDE
require __DIR__ . '/models/product.php';
require __DIR__ . '/models/category.php';
require __DIR__ . '/models/food.php';
require __DIR__ . '/models/toy.php';
require __DIR__ . '/models/kennel.php';

// DATA
$products = [
    new Kennel('Wooden House', 260, '/img/dogbigkennel.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Royal Canin', 'Medium', 'Black'),
    new Toy('Squeaky Bone', 16, '/img/bonesToy.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Royal Canin', 'Puppy & Adult'),
    new Product('Blue Leash', 20, '/img/blue_leash.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('White Collar', 17, '/img/white_collar.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Kennel('Calming Cat Bed', 36, '/img/catcomfybed.webp', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Trixie', 'Small', 'White/Grey'),
    new Product('Premium Pack', 30, '/img/premium_leash_collar.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Kennel('Sleepdog Pillow Bed', 75, '/img/dogkennel.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Royal Canin', 'XL Large', 'Gray'),
    new Product('Velvet Gold Pack', 60, '/img/velvetPack.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Food('Virtus Salmon', 65, '/img/virtus_salmon.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Virtus', '7.5 KG', 'Adult All Breeds'),
    new Toy('Scratching Ball', 43, '/img/toy_cat.webp', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Trixie', 'Adult'),
    new Kennel('Comfy Cat Bed', 72, '/img/cathouse.avif', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Royal Canin', 'Regular', 'Eucalyptus'),
    new Food('Virtus Kitten', 10, '/img/virtus-kitten.webp', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Virtus', '850 G', 'Puppy'),
];

$products[4]->setProductPrice(50);

var_dump($products);

?>