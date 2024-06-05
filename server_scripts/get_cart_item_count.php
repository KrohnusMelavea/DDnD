<?php

$get_cart_item_count_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_cart_item_count.sql");
function get_cart_item_count($account_uuid, $mysql_connection = null) {
 global $get_cart_item_count_query_template;

 $get_cart_item_count_query = sprintf($get_cart_item_count_query_template, $account_uuid);

 if ($mysql_connection == null) {
  $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);
  if ($mysql_connection->connect_errno) {
   return array("cart_item_count" => 0, "status" => 1);
  }
  $mysql_connection_supplied = false;
 } else {
  $mysql_connection_supplied = false;
 }

 $mysql_result = mysqli_query($mysql_connection, $get_cart_item_count_query);
 if (!$mysql_result->num_rows) {
  return array("cart_item_count" => 0, "status" => 1);
 }

 $cart_item_count = $mysql_result->fetch_row()[0];
 
 $mysql_result->free_result();
 if (!$mysql_connection_supplied) {
  $mysql_connection->close();
 }

 return array("cart_item_count" => $cart_item_count, "status" => 0);
}

?>