<?php

/* Max cookie size 4KB */

if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['uuid'])) {
    if (isset($_COOKIES['cart'])) {
        $cart = json_decode($_COOKIES['cart']);
        $item_count = 0;
        foreach ($cart as $uuid => $quantity) {
            $item_count += $quantity;
        }
        echo (string)$item_count;
    } else {
        echo "0";
    }
} else {
    echo "0";
}

?>