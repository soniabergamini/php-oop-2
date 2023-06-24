<?php
session_start();

// Get Json Data and Decode Data
header('Content-Type: application/json');
$cart = file_get_contents("./cartdata.json");

// Data Processing
$cartData = json_decode($cart, true);

// Debug Cart:
// if($cartData == []) {
//     $cartData = [
//         [
//             'id' => 1,
//             'cartItems' => []
//         ]
//     ];
// }

file_put_contents("./cartdata.json", json_encode($cartData));

if (!empty($_POST)) {
    if (isset($_POST['newItem'])) {

        // Add User New Cart Item to PHP Array and JSON Array
        $cartPresent = false;
        foreach($cartData as $userCarts) {
            if ($userCarts['id'] == $_SESSION['id']) {
                $cartPresent = true;
                $i = array_search($userCarts, $cartData);
                array_push($cartData[$i]['cartItems'], $_POST['newItem']);
            }
        };
        if(!$cartPresent) {
            $data = [
                'id' => $_SESSION['id'],
                'cartItems' => [$_POST['newItem']],
            ];
            $cartData[] = $data;
        }

    } else if (isset($_POST['deleteItem'])) {

        // Remove User Cart Item to PHP and JSON Array
        foreach ($cartData as $userCarts) {
            if ($userCarts['id'] == $_SESSION['id']) {
                $itemIndex = $_POST['deleteItem'];
                $i = array_search($userCarts, $cartData);
                array_splice($cartData[$i]['cartItems'], $itemIndex, 1);
            }
        }
    } else if (isset($_POST['emptyCart'])) {

        // Empty User Cart on purchase
        foreach ($cartData as $userCarts) {
            if ($userCarts['id'] == $_SESSION['id']) {
                $i = array_search($userCarts, $cartData);
                $cartData[$i]['cartItems'] = [];
            }
        }
        if($_POST['emptyCart'] == 'destroy') {
            session_destroy();
        }
    }
    file_put_contents("./cartdata.json", json_encode($cartData));
}
$cart = json_encode($cartData);

echo $cart;
?>