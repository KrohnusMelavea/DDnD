<?php

require_once("server_scripts/debug_log.php");

$add_item_to_cart_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/add_item_to_cart.sql");
$get_cart_item_uuid_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_cart_item_uuid.sql");
$add_new_item_to_cart_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/add_new_item_to_cart.sql");
function add_item_to_cart($account_uuid, $product_listing_uuid, $quantity, $mysql_connection = null) {
 global $add_item_to_cart_query_template;
 global $get_cart_item_uuid_query_template;
 global $add_new_item_to_cart_query_template;

 if ($mysql_connection == null) {
  $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);
  if ($mysql_connection->connect_errno) {
   return 1;
  }
  $mysql_connection_received = false;
 } else {
  $mysql_connection_received = true;
 }

 $get_cart_item_uuid_query = sprintf($get_cart_item_uuid_query_template, $account_uuid, $product_listing_uuid);
 $mysql_result = mysqli_query($mysql_connection, $get_cart_item_uuid_query);
 if ($mysql_result->num_rows) {
  $mysql_result->free_result();
  $mysql_query = sprintf($add_item_to_cart_query_template, $quantity, $account_uuid, $product_listing_uuid);
 } else {
  $mysql_query = sprintf($add_new_item_to_cart_query_template, bin2hex(openssl_random_pseudo_bytes(16)), $account_uuid, $product_listing_uuid, $quantity);
 }
 $mysql_result = mysqli_query($mysql_connection, $mysql_query);

 if (!$mysql_connection_received) {
  $mysql_connection->close();
 }

 if ($mysql_result) {
  return 0;
 } else {
  return 1;
 }
}

?>