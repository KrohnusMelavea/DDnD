<?php

$order_card_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/order_card.html");
function generate_order_card($order_item) {
 global $order_card_template;

 return sprintf($order_card_template, $order_item->image_url, $order_item->name, $order_item->price / 100.0, $order_item->quantity, $order_item, $order_item->price * $order_item->quantity / 100.0);
}

?>