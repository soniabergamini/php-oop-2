<?php
// Session
session_start();
var_dump($_SESSION);

// Session
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = rand(1, 5000);
    var_dump($_SESSION['id']);
}
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}

// Session Debug
// $_SESSION['id'] = 1;
// $printID = json_encode($_SESSION['id']);
// echo "<script> console.log('DEBUG => Session ID: ', $printID) </script>";
// echo '<pre>', print_r("Session ID: " . $_SESSION['id'], true), '</pre>';

// Include
require "db.php";
require_once __DIR__ . '/models/category.php';
require_once __DIR__ . '/models/product.php';
require_once __DIR__ . '/models/food.php';
require_once __DIR__ . '/models/toy.php';
require_once __DIR__ . '/models/kennel.php';

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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Script Vue Js -->
    <script src="./js/vue.3.2.47.js"></script>
    <!-- Script Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

    <!-- Vue JS App -->
    <div id="app">

        <!-- Page Overlay -->
        <div v-if="showLogin" class="w-full h-full z-20 bg-[rgba(0,0,0,.6)] fixed"></div>

        <!-- Page title -->
        <header class="py-7">
            <h1 class="text-center font-bold text-5xl text-[#F1641D]">🐾 SHOP 🐾</h1>
        </header>

        <!-- Page Fixed Buttons -->
        <section>

            <!-- Login / Signup -->
            <button v-show="<?php echo !$_SESSION['login'] ?>" @click="showLogin = !showLogin" class="fixed right-5 top-20 z-40 hover:bg-[#ef8f5f] bg-[#F1641D] h-[70px] w-[70px] text-white font-bold rounded" :class="showLogin === true ? 'animate-pulse' : null"><i class="fa-solid fa-user fa-xl"></i></button>

            <!-- Cart -->
            <button @click="showCart = !showCart" class="fixed right-5 top-40 z-40 hover:bg-[#ef8f5f] border-2 border-[#F1641D] bg-[#F1641D] h-[70px] w-[70px] text-white font-bold rounded">
                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                <span v-show="cartNotif" class="bg-red-600 absolute z-50 top-[-10px] right-[-8px] rounded-full h-6 w-6 text-white">{{ getItemsNum() }}</span>
            </button>

            <!-- Filter Product for 'Cat' -->
            <button @click="productFilter = 'Cat'" class="fixed right-5 top-60 z-40 hover:bg-[#ef8f5f] bg-[#F1641D] h-[70px] w-[70px] text-white font-bold rounded"><i class="fa-solid fa-cat fa-xl"></i></button>

            <!-- Filter Product for 'Dog' -->
            <button @click="productFilter = 'Dog'" class="fixed right-5 top-80 z-40 hover:bg-[#ef8f5f] bg-[#F1641D] h-[70px] w-[70px] text-white font-bold rounded"><i class="fa-solid fa-dog fa-xl"></i></button>

            <!-- Back (Show All Product) -->
            <button v-show="productFilter != 'All'" @click="productFilter = 'All'" class="fixed right-5 top-[25rem] z-40 hover:bg-[#ef8f5f] bg-[#F1641D] h-[70px] w-[70px] text-white font-bold rounded"><i class="fa-solid fa-rotate-left fa-xl"></i></button>

        </section>

        <!-- Login / Signup PopUp -->
        <section v-show="showLogin" class="text-center border rounded absolute w-[55%] top-[50%] left-[50%] p-5 translate-x-[-50%] translate-y-[-50%] z-50 bg-white">
            <h3 class="font-bold text-2xl text-[#5C737C]">LOGIN OR SIGNUP</h3>

            <!-- Login Form  -->
            <form v-show="formLogin" action="login.php" method="POST" class="flex flex-col items-center justify-start">
                <p class="my-3 text-sm">Insert your data to <strong>login</strong> or <strong class="hover:underline text-[#F1641D] hover:text-[#E37C71] cursor-pointer" @click="formLogin = false">create new account HERE</strong>.</p>
                <div class="flex justify-center flex-wrap gap-3 w-full my-3">
                    <input type="email" placeholder="email" name="email" id="email" class="border w-[35%] rounded px-2 py-1" required>
                    <input type="password" placeholder="password" name="password" id="password" class="border w-[35%] rounded px-2 py-1" required>
                </div>
                <button type="submit" class="mt-3 rounded-full border-2 border-[#F1641D] px-4 py-0.5 bg-[#F1641D] hover:bg-[#ef7b40] hover:border-[#F1641D] text-white font-bold hover:bg-white hover:text-[#F1641D] tracking-wide"><i class="fa-solid fa-paw fa-sm mr-2"></i> LOGIN</button>
            </form>

            <!-- Signup Form  -->
            <form v-show="!formLogin" action="signup.php" method="POST" class="flex flex-col items-center justify-start">
                <p class="my-3 text-sm">Insert your data to <strong>create new account</strong> for free. Already have an account? <strong class="hover:underline text-[#F1641D] hover:text-[#E37C71] cursor-pointer" @click="formLogin = true">Click HERE to login</strong>.</p>
                <div class="flex justify-center flex-wrap gap-3 w-full my-3">
                    <input type="email" placeholder="signup_email" name="signup_email" id="signup_email" class="border w-[35%] rounded px-2 py-1" required>
                    <input type="password" placeholder="signup_password" name="signup_password" id="signup_password" class="border w-[35%] rounded px-2 py-1" required>
                </div>
                <button type="submit" class="mt-3 rounded-full border-2 border-[#F1641D] px-4 py-0.5 bg-[#F1641D] hover:bg-[#ef7b40] hover:border-[#F1641D] text-white font-bold hover:bg-white hover:text-[#F1641D] tracking-wide"><i class="fa-solid fa-paw fa-sm mr-2"></i> SIGNUP </button>
            </form>

        </section>

        <!-- Main Contents -->
        <main>

            <!-- Purchase Confirmation -->
            <section v-if="purchase" class="border px-2 md:px-5 py-7 bg-[#f2d0cb]">

                <!-- Spinner loader -->
                <div v-if="loading" role="status" class="mx-auto max-w-[1000px] flex justify-center items-center">
                    <svg aria-hidden="true" class="w-10 h-10 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-[#F1641D]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                    </svg>
                </div>

                <!-- Purchase Confirmation Message -->
                <div v-if="confirmation" class="mx-auto max-w-[1000px] text-center">
                    <h3 class="text-xl font-bold text-green-500">🥳 CONGRATULATIONS!</h3>
                    <p class="mt-5">Purchase successfull! You'll receive your products at home very soon <i class="fa-solid fa-dog"></i> </p>
                </div>

            </section>

            <!-- Cart & Checkout Section -->
            <section v-show="showCart" class="border px-2 md:px-5 py-7 bg-[#f2d0cb]">
                <!-- Cart Items -->
                <div class="mx-auto max-w-[1000px] flex gap-3 flex-wrap">
                    <h3 v-show="!sessionCart.length" class="text-xl text-center w-full">🛒 YOUR CART IS EMPTY</h3>
                    <div class="grow">
                        <h3 v-show="sessionCart.length" class="text-lg">🛍️ YOUR PRODUCT LIST:</h3>

                        <!-- Item Details -->
                        <template v-for="(item, i) in sessionCart">
                            <div v-show="sessionCart.length" class="flex items-center my-2 gap-2 bg-white rounded relative">
                                <i @click="removeFromCart(i)" class="fa-solid fa-circle-xmark fa-lg text-red-600 absolute top-4 right-1 cursor-pointer"></i>
                                <div>
                                    <img :src="item.img" alt="img" class="h-[120px] w-[120px] object-cover object-center border">
                                </div>
                                <div>
                                    <p>
                                        <strong>PRODUCT: </strong>
                                        <span>{{ item.name }}</span>
                                    </p>
                                    <p>
                                        <strong>PRICE: </strong>
                                        <span>${{item.price}}</span>
                                    </p>
                                </div>
                            </div>
                        </template>

                    </div>

                    <!-- Cart Summary, Total & Checkout -->
                    <div class="bg-white rounded p-3 flex flex-col min-w-[30%] border" v-show="sessionCart.length > 0">

                        <!-- Cart Summary -->
                        <template v-for="item in sessionCart">
                            <div class="flex justify-between border-b-2 my-2">
                                <span>{{item.name}}</span>
                                <strong>${{item.price}}</strong>
                            </div>
                        </template>

                        <!-- Shipping & Taxes -->
                        <div class="flex justify-between border-b-2 my-2">
                            <span>Shipping</span>
                            <strong>$0</strong>
                        </div>
                        <div class="flex justify-between border-b-2 my-2">
                            <span>Tax</span>
                            <strong>$0</strong>
                        </div>

                        <!-- Total -->
                        <h3 class="text-xl mt-2 font-bold">TOTAL: ${{ getTotal }}</h3>

                        <!-- One Click Checkout -->
                        <button @click="oneClickCheckout()" class="rounded-full border-2 border-[#F1641D] px-3 py-1.5 bg-[#F1641D] hover:bg-[#ef7b40] hover:bg-white hover:text-[#F1641D] text-white font-bold mt-3 justify-self-end"><i class="fa-brands fa-cc-paypal fa-xl"></i> SHOP NOW</button>

                    </div>

                </div>
            </section>

            <!-- Products Section -->
            <section class=" flex justify-center gap-4 flex-wrap px-2 md:px-5 pt-3 pb-7">

                <!-- Product Cards -->
                <?php foreach ($products as $product) { ?>
                    <div v-show="productFilter == 'All' || productFilter == '<?= ucfirst(strtolower($product->category->getCategoryName())) ?>'" class="shadow-xl shadow-neutral-300 rounded py-5 px-3 w-[calc(100%/2-1rem)] md:w-[calc(100%/3-1rem)] lg:w-[calc(100%/5-1rem)] text-sm relative flex flex-col gap-2">

                        <!-- Category Info -->
                        <div class="absolute top-4 left-1 z-10 bg-slate-200 px-2 py-1 rounded">
                            <div class="flex items-center gap-1">
                                <figure>
                                    <img src=".<?= $product->category->getCategoryIcon() ?>" alt="<?= $product->category->getCategoryName() ?>-img" class="w-[30px] h-[30px] object-cover object-top rounded-full border">
                                </figure>
                                <figcaption>
                                    <small><?= ucfirst(strtolower($product->category->getCategoryName())) ?></small>
                                    <?php if ($product instanceof Food || $product instanceof Toy || $product instanceof Kennel) { ?>
                                        <small> | <?= get_class($product) ?></small>
                                    <?php } ?>
                                </figcaption>
                            </div>
                        </div>

                        <!-- Product Image -->
                        <div>
                            <img src=".<?= $product->getProductImg() ?>" alt="<?= str_replace(' ', '_', $product->getProductName()) ?>-img" class="w-full h-[270px] object-cover object-center border">
                        </div>

                        <!-- Product Name -->
                        <div class="flex justify-center">
                            <h3 class="font-bold text-3xl text-[#5C737C]"><?= $product->getProductName() ?></h3>
                        </div>

                        <!-- Product Details -->
                        <div>

                            <!-- Food Product Details -->
                            <?php if ($product instanceof Food) { ?>
                                <span class="text-base">
                                    <?php try {
                                        echo $product->getProductBrand();
                                    } catch (Exception $e) {
                                        echo 'Exception: ' . $e->getMessage();
                                        echo 'Unspecified Brand';
                                    };
                                    echo ' &#x2022; ' . $product->getProductAge() . ' &#x2022; ' . $product->getProductWeight()
                                    ?>
                                </span>

                                <!-- Toy Product Details -->
                            <?php } elseif ($product instanceof Toy) { ?>
                                <span class="text-base"><?= $product->getProductBrand() . ' &#x2022; ' . $product->getProductAge() ?></span>

                                <!-- Kennel Product Details -->
                            <?php } elseif ($product instanceof Kennel) { ?>
                                <span class="text-base"><?= $product->getProductBrand() . ' &#x2022; ' . $product->getProductSize() . ' &#x2022; ' . $product->getProductColor() ?></span>

                                <!-- Generic Product Details -->
                            <?php } else { ?>
                                <span class="text-base"> <?= $product->category->getCategoryDescrip() ?></span>
                            <?php } ?>

                            <!-- Shipping & Price -->
                            <p class="my-2">🚚 Free Shipping</p>
                            <span class="font-bold text-xl text-green-600">$<?= $product->getProductPrice() ?> </span>
                            <del class="text-gray-500"> $<?= $product->getProductPrice() * 2 ?></del>
                            <span class="text-gray-500"> (50% off)</span>

                        </div>

                        <!-- Add To Cart Button -->
                        <div class="flex justify-center my-2">
                            <button @click="addToCart({name: '<?= $product->getProductName() ?>', price: <?= $product->getProductPrice() ?>, img: '.<?= $product->getProductImg() ?>'})" class="rounded-full border-2 border-[#F1641D] px-3 py-1.5 bg-[#F1641D] hover:bg-[#ef7b40] hover:border-[#F1641D] text-white font-bold hover:bg-white hover:text-[#F1641D]">ADD TO CART</button>
                        </div>

                    </div>
                <?php } ?>

            </section>

        </main>

    </div>

    <!-- Script App JS -->
    <script src="./js/app.js"></script>
    <script>
        app.$data.sessionId = <?= $_SESSION['id'] ?>;
        localStorage.setItem('session_id', "<?= $_SESSION['id'] ?>");
    </script>";
    </script>

</body>

</html>