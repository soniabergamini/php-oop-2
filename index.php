<?php
// Include
require "db.php";
require_once __DIR__ . '/models/product.php';
require_once __DIR__ . '/models/category.php';

// SOMETHING TO FIX: MAMP/PHP keeps giving fatal errors on page regarding class creation, product creation and file loading. Already tried various solutions found on online forums.

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <!-- Page title -->
    <header class="py-7">
        <h1 class="text-center font-bold text-5xl text-red-600">🐶 SHOP</h1>
    </header>

    <!-- Main Contents -->
    <main>
        <section class="flex gap-4 flex-wrap px-7">

            <!-- Product Cards -->
            <?php foreach ($products as $product) { ?>
                <div class="border py-4 px-3 w-[calc(100%/5)] text-sm border-neutral-800 relative flex flex-col gap-2">

                    <!-- Category Info -->
                    <div class="absolute top-2 left-1 z-20 bg-slate-200 px-2 py-1 rounded">
                        <div class="flex items-center gap-1">
                            <figure>
                                <img src=".<?= $product->category->getCategoryIcon() ?>" alt="<?= $product->category->getCategoryName() ?>-img" class="w-[30px] h-[30px] object-cover object-top rounded-full border">
                            </figure>
                            <figcaption>
                                <small><?= ucfirst(strtolower($product->category->getCategoryName())) ?></small>
                            </figcaption>
                        </div>
                    </div>

                    <!-- Product Image -->
                    <div>
                        <img src=".<?= $product->getProductImg() ?>" alt="<?= str_replace(' ', '_', $product->getProductName()) ?>-img" class="w-full h-[200px] object-cover object-center border">
                    </div>

                    <!-- Product Name -->
                    <div class="flex justify-center">
                        <h3 class="font-bold text-3xl"><?= $product->getProductName() ?></h3>
                    </div>

                    <!-- Product Details -->
                    <div>
                        <p>🚚 Free Shipping</p>
                        <span class="font-bold text-xl text-green-600">$<?= $product->getProductPrice() ?> </span>
                        <del class="text-gray-500"> $<?= $product->getProductPrice() * 2 ?></del>
                        <span class="text-gray-500"> (50% off)</span>
                    </div>

                    <!-- Button Shop & Price -->
                    <div class="flex justify-center my-2">
                        <button class="rounded-full hover:border-2 px-3 py-1.5 bg-[#F1641D] hover:bg-[#ef7b40] hover:border-[#F1641D] text-white font-bold">SHOP NOW</button>
                    </div>

                </div>
            <?php } ?>

        </section>

    </main>

</body>

</html>