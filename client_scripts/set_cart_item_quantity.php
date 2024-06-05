<?php

require_once("server_scripts/set_cart_item_quantity.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}
if (!isset($_SESSION["account_uuid"])) {
 echo "{\"status\":2}";
} else {
 $post = json_decode(file_get_contents("php://input"), true);
 if (!isset($post["product_listing_uuid"]) || !isset($post["quantity"])) {
  echo "{\"status\":2}";
 } else {
  ["success" => $success] = set_cart_item_quantity(bin2hex($_SESSION["account_uuid"]), $post["product_listing_uuid"], $post["quantity"]);
  if ($success) {
   $status = 0;
  } else {
   $status = 2;
  }
  echo "{\"status\":$status}";
 }
}

?>