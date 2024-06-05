<?php

require("server_scripts/get_cart_item_count.php");
require("server_scripts/get_account_info.php");
require("server_generators/navigation_bar.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 $cart_item_count = get_cart_item_count(bin2hex($_SESSION["account_uuid"]));
 $account_info = get_account_info($_SESSION["account_uuid"]);
 echo generate_navigation_bar($account_info->profile_url, $cart_item_count);
} else {
 echo generate_navigation_bar("/res/profile.png", 0);
}

?>