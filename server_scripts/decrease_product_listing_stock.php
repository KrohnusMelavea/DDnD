<?php

require_once("server_scripts/debug_log.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$decrease_product_listing_stock_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/decrease_product_listing_stock.sql");
function decrease_product_listing_stock($product_listing_uuid, $amount, $mysql_connection = null) {
 global $decrease_product_listing_stock_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($decrease_product_listing_stock_query_template, $amount, $product_listing_uuid));
 if (!$mysql_result) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("status" => 1);
 }

 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 return array("status" => 0);
}

?>