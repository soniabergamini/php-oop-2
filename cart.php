<?php
// echo json_encode($cart); 

// Get Json Data and Decode Data
header('Content-Type: application/json');
$cart = file_get_contents("./cartdata.json");

// Data Processing
$cartData = json_decode($cart, true);
if (!empty($_POST)) {
    if (isset($_POST['newItem'])) {

        // Add New Cart Item to PHP Array and JSON Array
        $cartData[] = $_POST['newItem'];

    } else if (isset($_POST['deleteItem'])) {

        // Remove Cart Item to PHP and JSON Array
        $itemIndex = $_POST['deleteItem'];
        array_splice($cartData, $itemIndex, 1);

    } else if (isset($_POST['emptyCart'])) {

        // Empty Cart on purchase
        $cartData = $_POST['emptyCart'];

    }
    file_put_contents("./cartdata.json", json_encode($cartData));
} else {

    //Empty Cart before unmount
    $cartData = [];
    file_put_contents("./cartdata.json", json_encode($cartData));
}
$cart = json_encode($cartData);

echo $cart;
?>