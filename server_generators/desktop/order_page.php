<?php

require_once("server_scripts/get_account_orders.php");
require_once("server_generators/desktop/order_info.php");
require_once("server_generators/desktop/order_cards.php");

function generate_order_page($account_uuid) {
 $account_orders_result = get_account_orders($account_uuid);
 if ($account_orders_result["status"] != 0) {
  return array("html" => "", "status" => $account_orders_result["status"]);
 }

 $generated_order_page = "";
 foreach ($account_orders_result["orders"] as $order_item) {
  $order_cards_result = generate_order_cards($order_item["order_items"]);
  $generated_order_page = $generated_order_page . generate_order_info($order_item["order_info"], $order_cards_result["quantity"], count($order_item["order_items"]), $order_cards_result["price"]) . $order_cards_result["generated_order_cards"];
 }

 return $generated_order_page;
}

?>