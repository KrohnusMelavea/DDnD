<?php

require_once("server_scripts/debug_log.php");
require_once("server_scripts/get_cart_item_count.php");
require_once("server_scripts/get_account_information.php");
require_once("server_generators/desktop/navigation_bar.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 ["cart_item_count" => $cart_item_count, "status" => $status] = get_cart_item_count(bin2hex($_SESSION["account_uuid"]));
 $result = get_account_information(bin2hex($_SESSION["account_uuid"]));
 if ($result["status"] == 0) {
  echo json_encode(array("html" => generate_navigation_bar($result["account_information"]->profile_url, $cart_item_count), "status" => 0));
 } else {
  echo json_encode(array("html" => "", "status" => 1));
 }
} else {
 echo json_encode(array("html" => generate_navigation_bar("/res/profile.png", 0), "status" => 0));
}

?>