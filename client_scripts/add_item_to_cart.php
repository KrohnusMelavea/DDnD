<?php

require_once("server_scripts/add_item_to_cart.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}
if (isset($_SESSION["account_uuid"])) {
 $post = json_decode(file_get_contents("php://input"), TRUE);
 if (isset($post["product_listing_uuid"]) && isset($post["quantity"])) {
  $result = add_item_to_cart(bin2hex($_SESSION["account_uuid"]), $post["product_listing_uuid"], $post["quantity"]);
  echo "{\"status\":$result}";
 } else {
  echo "{\"status\":1}";  /* Error */
 }
} else {
 echo "{\"status\":2}";   /* Login */
}

?>