<?php

require_once("server_scripts/debug_log.php");
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

 for ($i = 0; $i < $mysql_result->num_rows; ++$i){
  $row = $mysql_result->fetch_row();
  $mysql_product_listing_stock_result = mysqli_query($mysql_connection, sprintf($get_product_listing_stock_query_template, bin2hex($row[2])));
  if (!$mysql_product_listing_stock_result || $mysql_product_listing_stock_result->fetch_row()[0] < $row[3]) {
   $mysql_result->free_result();
   maybe_destroy_mysql_connection($mysql_connection_created);
   return array("status" => 1);
  }
  $result = decrease_product_listing_stock(bin2hex($row[2]), $row[3], $mysql_connection);
  if ($result["status"] != 0) {
   $mysql_result->free_result();
   maybe_destroy_mysql_connection($mysql_connection_created);
   return array("status" => $result["status"]);
  }
 }

 $result = clear_profile_cart($account_uuid, $mysql_connection);

 $mysql_result->free_result();
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 if ($result["status"] != 0) {
  return array("status" => $result["status"]);
 } else {
  return array("status" => 0);
 }
}

?>