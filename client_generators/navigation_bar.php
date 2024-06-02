<?php

require("scripts/get_cart_items.php");
require("scripts/get_account_info.php");
require("generators/navigation_bar.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 $cart_items = get_cart_items($_SESSION["account_uuid"]);
 $account_info = get_account_info($_SESSION["account_uuid"]);
 echo generate_navigation_bar($account_info->profile_url, count($cart_items));
} else {
 echo generate_navigation_bar("/res/profile.png", 0);
}

?>