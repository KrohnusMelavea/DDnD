<?php

$order_card_template = file_get_contents("order_card_template.html");
/*str*/ function generate_order_card(/*str*/$product_url, /*str*/$product_image_url, /*str*/$product_title, /*int*/$price_cents, /*int*/$quantity, /*int*/$order_status) {
 global $order_card_template;
 switch ($order_status) {
 case 0:
  $order_status_class = "complete";
  $order_status_text = "Complete";
  break;
 case 1:
  $order_status_class = "incomplete";
  $order_status_text = "Incomplete";
  break;
 case 2:
  $order_status_class = "partial";
  $order_status_text = "Partial";
  break;
 case 3:
  $order_status_class = "cancelled";
  $order_status_text = "Cancelled";
  break;
 }
 return sprintf(
  $order_card_template, 
  $product_url, 
  $product_image_url, 
  $product_title, 
  (float)$price_cents / 100.0, 
  $quantity, 
  (float)$price_cents / 100.0 * $quantity, 
  $order_status_class, 
  $order_status_text);
}

?>