<?php

require("server_scripts/get_cart_items.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}
if (isset($_SESSION["account_uuid"])) {
 /* Note: attempt simple get_object_vars */
 $cart_items = get_cart_items($_SESSION["account_uuid"]);
 $cart_item_arrays = array();
 foreach ($cart_items as $cart_item) {
  $cart_item_arrays[] = get_object_vars($cart_item);
 }
 echo json_encode(array("cart_items" => $cart_item_arrays));
} else {
 echo json_encode(array("cart_items" => array()));
}

?>