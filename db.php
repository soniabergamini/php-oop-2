<?php
//  INCLUDE
require __DIR__ . '/models/product.php';
require __DIR__ . '/models/category.php';
require __DIR__ . '/models/food.php';
require __DIR__ . '/models/toy.php';
require __DIR__ . '/models/kennel.php';
require __DIR__ . '/models/cart.php';

// DATA
$cart = new Cart([], 0);
$products = [
    new Kennel('Wooden House', 260, '/img/dogbigkennel.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Medium', 'Black'),
    new Kennel('Calming Cat Bed', 36, '/img/catcomfybed.webp', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Small', 'White/Grey'),
    new Kennel('Comfy Cat Bed', 72, '/img/cathouse.avif', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Regular', 'Eucalyptus'),
    new Kennel('Sleepdog Pillow', 75, '/img/dogkennel.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'XL Large', 'Gray'),
    new Product('Ceraminc Bowl', 15, '/img/bowl.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Toy('Squeaky Bone', 16, '/img/bonesToy.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Puppy & Adult'),
    new Toy('Rabbit for Cat', 22, '/img/catrabbit.avif', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Adult & Puppy'),
    new Product('White Collar', 17, '/img/white_collar.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('Velvet Gold Pack', 60, '/img/velvetPack.avif', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Food('Virtus Salmon', 65, '/img/virtus_salmon.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), '7.5 KG', 'Adult All Breeds'),
    new Toy('Scratching Ball', 43, '/img/toy_cat.webp', new Category('cat', 'We Love our Kittens', '/img/cat.png'), 'Adult'),
    new Food('Virtus Kitten', 10, '/img/virtus-kitten.webp', new Category('cat', 'We Love our Kittens', '/img/cat.png'), '850 G', 'Puppy'),
    new Toy('Mini Bone', 19, '/img/minibone.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png'), 'Puppy'),
    new Product('Premium Pack', 30, '/img/premium_leash_collar.webp', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
    new Product('Blue Leash', 20, '/img/blue_leash.jpeg', new Category('dog', 'Special Products for Special Dogs', '/img/dog.png')),
];

// Set Product Traits
$products[0]->setProductBrand('Paw Love');
$products[1]->setProductBrand('Trixie');
$products[2]->setProductBrand('Royal Canin');
$products[3]->setProductBrand('Royal Canin');
$products[4]->setProductBrand('Paw Love');
$products[5]->setProductBrand('ForDogs');
$products[6]->setProductBrand('Paw Love');
$products[7]->setProductBrand('Royal Canin');
$products[8]->setProductBrand('Royal Canin');
$products[9]->setProductBrand('Virtus');
$products[10]->setProductBrand('Trixie');
// $products[11]->setProductBrand('Virtus');
$products[11]->setProductBrand(null);
$products[12]->setProductBrand('ForDogs');
$products[13]->setProductBrand('ForDogs');
$products[13]->setProductBrand('Arcaplanet');

// var_dump($cart)
// var_dump($products);
echo '<pre>', var_dump($products), '</pre>';

?>