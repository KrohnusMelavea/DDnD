<?php

require_once("server_scripts/debug_log.php");
require_once("server_scripts/get_account_information.php");
require_once("server_scripts/add_order_product_listing.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$add_order_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/add_order.sql");
function add_order($account_uuid, $cart_items, $mysql_connection = null) {
 global $add_order_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("status" => 1);
 }

 $result = get_account_information($account_uuid, $mysql_connection);
 if ($result["status"] != 0) { /* Error Propagation */
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("status" => $result["status"]);
 }

 $order_uuid = bin2hex(openssl_random_pseudo_bytes(16));
 $mysql_query = mysqli_query($mysql_connection, sprintf($add_order_query_template, $order_uuid, $account_uuid, $result["account_information"]->address));
 if (!$mysql_query) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("status" => 1);
 }

 foreach ($cart_items as $cart_item) {
  $result = add_order_product_listing($order_uuid, $cart_item["product_listing_uuid"], $cart_item["quantity"], $mysql_connection);
  if ($result["status"] != 0) { /* Error Propagation */
   maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
   return array("status" => 1);
  }
 }

 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 return array("status" => 0);
}

?>