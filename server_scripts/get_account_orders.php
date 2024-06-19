<?php

require_once("server_scripts/get_order_items.php");
require_once("server_scripts/get_profile_orders.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

function get_account_orders($account_uuid, $mysql_connection = null) {
 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("orders" => array(), "status" => 1);
 }

 $orders_result = get_profile_orders($account_uuid, $mysql_connection);
 if ($orders_result["status"] != 0) {
  return array("orders" => array(), "status" => $orders_result["status"]);
 }

 $orders = array();
 foreach ($orders_result["orders"] as $order_item) {
  $order_items_result = get_order_items($order_item->uuid, $mysql_connection);
  if ($order_items_result["status"] != 0) {
   continue;
  }
  $orders[] = array("order_info" => $order_item, "order_items" => $order_items_result["order_items"]);
 }

 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 
 return array("orders" => $orders, "status" => 0);
}

?>