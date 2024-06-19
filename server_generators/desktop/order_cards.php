<?php

$order_cards_template = file_get_contents("$_SERVER[DOCUMENT]/templates/order_cards.html");
function generate_order_cards($order_items) {
 global $order_cards_template;

 $price = 0.0;
 $quantity = 0;
 $generated_order_cards = "";
 foreach ($order_items as $order_item) {
  $price += $order_item->price;
  $quantity += $order_item->quantity;
  $generated_order_cards = $generated_order_cards . generate_order_card($order_item);
 }

 return array("generated_order_cards" => sprintf($order_cards_template, $generated_order_cards), "quantity" => $quantity, "price" => $price);
}

?>