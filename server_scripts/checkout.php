<?php

require_once("server_scripts/debug_log.php");
require_once("server_scripts/add_order.php");
require_once("server_scripts/clear_profile_cart.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");
require_once("server_scripts/decrease_product_listing_stock.php");

$get_cart_items_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_cart_items.sql");
$get_product_listing_stock_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_product_listing_stock.sql");
function checkout($account_uuid, $mysql_connection = null) {
 global $get_cart_items_query_template;
 global $get_product_listing_stock_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($get_cart_items_query_template, $account_uuid));
 if (!$mysql_result) {
  return array("status" => 1);
 }

 $cart_items = array();
 for ($i = 0; $i < $mysql_result->num_rows; ++$i) {
  $row = $mysql_result->fetch_row();
  $cart_item = array("product_listing_uuid" => bin2hex($row[2]), "quantity" => $row[3]);
  $cart_items[] = $cart_item;

  $mysql_product_listing_stock_result = mysqli_query($mysql_connection, sprintf($get_product_listing_stock_query_template, $cart_item["product_listing_uuid"]));
  if (!$mysql_product_listing_stock_result) {
   $mysql_result->free_result();
   maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
   return array("status" => 1);
  }
  
  $stock = $mysql_product_listing_stock_result->fetch_row()[0];
  $mysql_product_listing_stock_result->free_result();
  if ($stock < $cart_item["quantity"]) {
   $mysql_result->free_result();
   maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
   return array("status" => 1);
  }
 }
 $mysql_result->free_result();

 foreach ($cart_items as $cart_item) {
  $result = decrease_product_listing_stock($cart_item["product_listing_uuid"], $cart_item["quantity"], $mysql_connection);
  if ($result["status"] != 0) { /* Error Propagation */
   maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
   return array("status" => $result["status"]);
  }
 }
 $result = add_order($account_uuid, $cart_items, $mysql_connection);
 if ($result["status"] != 0) { /* Error Propagation */
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("status" => $result["status"]);
 }

 $result = clear_profile_cart($account_uuid, $mysql_connection);
 if ($result["status"] != 0) { /* Error Propagation */
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("status" => $result["status"]);
 }
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 if ($result["status"] != 0) { /* Error Propagation */
  return array("status" => $result["status"]);
 } else {
  return array("status" => 0);
 }
}

?>