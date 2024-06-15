<?php

require_once("server_scripts/debug_log.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$get_cart_item_count_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_cart_item_count.sql");
function get_cart_item_count($account_uuid, $mysql_connection = null) {
 global $get_cart_item_count_query_template;

 $get_cart_item_count_query = sprintf($get_cart_item_count_query_template, $account_uuid);

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  debug_log("bruh");
  return array("cart_item_count" => 0, "status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, $get_cart_item_count_query);
 if ($mysql_result->num_rows == 0) {
  debug_log("bruh");
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("cart_item_count" => 0, "status" => 1);
 }

 $cart_item_count = $mysql_result->fetch_row()[0];
 
 $mysql_result->free_result();
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 return array("cart_item_count" => $cart_item_count, "status" => 0);
}

?>