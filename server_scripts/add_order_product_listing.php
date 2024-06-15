<?php

require_once("server_scripts/debug_log.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$add_order_product_listing_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/add_order_product_listing.sql");
function add_order_product_listing($order_uuid, $product_listing_uuid, $quantity, $mysql_connection = null) {
 global $add_order_product_listing_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($add_order_product_listing_query_template, $order_uuid, $product_listing_uuid, $quantity));
 if (!$mysql_result) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("status" => 1);
 }

 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 return array("status" => 0);
}

?>