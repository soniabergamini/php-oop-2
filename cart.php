<?php
session_start();

// Get Json Data and Decode Data
header('Content-Type: application/json');
$cart = file_get_contents("./cartdata.json");

// Data Processing
$cartData = json_decode($cart, true);
if (!empty($_POST)) {
    if (isset($_POST['newItem'])) {

        // Add User New Cart Item to PHP Array and JSON Array
        $cartPresent = false;
        foreach($cartData as $userCarts) {
            if ($userCarts['id'] == $_SESSION['id']) {
                $cartPresent = true;
                $i = array_search($userCarts, $cartData);
                array_push($cartData[$i]['cartItems'], $_POST['newItem']);
                break;
            }
        };
        if(!$cartPresent) {
            $data = [
                'id' => $_SESSION['id'],
                'cartItems' => [$_POST['newItem']],
            ];
            $cartData[] = $data;
            $i = sizeof($cartData) - 1;
        }

    } else if (isset($_POST['deleteItem'])) {

        // Remove User Cart Item to PHP and JSON Array
        foreach ($cartData as $userCarts) {
            if ($userCarts['id'] == $_SESSION['id']) {
                $itemIndex = $_POST['deleteItem'];
                $i = array_search($userCarts, $cartData);
                array_splice($cartData[$i]['cartItems'], $itemIndex, 1);
                break;
            }
        }
    } else if (isset($_POST['emptyCart'])) {

        // Empty User Cart on purchase
        foreach ($cartData as $userCarts) {
            if ($userCarts['id'] == $_SESSION['id']) {
                $i = array_search($userCarts, $cartData);
                $cartData[$i]['cartItems'] = [];
                break;
            }
        }
        if($_POST['emptyCart'] == 'destroy') {
            session_destroy();
        }
    }
    file_put_contents("./cartdata.json", json_encode($cartData));
    $cart = json_encode($cartData[$i]['cartItems']); // Send to VueJS User Session Cart only
}

echo $cart;
?>