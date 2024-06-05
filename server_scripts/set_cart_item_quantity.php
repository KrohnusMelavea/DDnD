<?php

require_once("server_scripts/debug_log.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$get_cart_item_uuid_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_cart_item_uuid.sql");
$add_new_item_to_cart_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/add_new_item_to_cart.sql");
$set_cart_item_quantity_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/set_cart_item_quantity.sql");
function set_cart_item_quantity($account_uuid, $product_listing_uuid, $quantity, $mysql_connection = null) {
 global $get_cart_item_uuid_query_template;
 global $add_new_item_to_cart_query_template;
 global $set_cart_item_quantity_query_template;

 [$mysql_connection, $mysql_connection_created, $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if ($mysql_connection_created_success == 1) {
  return array("success" => 1);
 }

 $get_cart_item_uuid_query = sprintf($get_cart_item_uuid_query_template, $account_uuid, $product_listing_uuid);
 $mysql_result = mysqli_query($mysql_connection, $get_cart_item_uuid_query);
 if ($mysql_result->num_rows) {
  $mysql_result->free_result();
  $mysql_query = sprintf($set_cart_item_quantity_query_template, $quantity, $account_uuid, $product_listing_uuid);
 } else {
  $mysql_query = sprintf($add_new_item_to_cart_query_template, bin2hex(openssl_random_pseudo_bytes(16)), $account_uuid, $product_listing_uuid, $quantity);
 }
 $mysql_result = mysqli_query($mysql_connection, $mysql_query);

 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 if ($mysql_result) {
  return 0;
 } else {
  return 1;
 }
}

?>