<?php

require_once("objects/cart_item.php");

$cart_item_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/cart_item.html");
function generate_cart_item($cart_item) {
 global $cart_item_template;

 return sprintf($cart_item_template, $cart_item->image_url, $cart_item->name, $cart_item->description, $cart_item->price / 100.0, $cart_item->quantity, $cart_item->price * (float)$cart_item->quantity / 100.0);
}

?>