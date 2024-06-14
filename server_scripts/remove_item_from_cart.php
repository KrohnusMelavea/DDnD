<?php

require_once("server_scripts/debug_log.php");

$remove_item_from_cart_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/remove_item_from_cart.sql");
function remove_item_from_cart($account_uuid, $product_listing_uuid, $mysql_connection = null) {
 global $remove_item_from_cart_query_template;

 $mysql_connection_received = true;
 if ($mysql_connection == null) {
  $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);
  if ($mysql_connection->connect_errno) {
   return 1;
  }
  $mysql_connection_received = false;
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($remove_item_from_cart_query_template, $account_uuid, $product_listing_uuid));
 
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