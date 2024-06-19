<?php

require_once("objects/order_item.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$get_order_items_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_order_items.sql");
function get_order_items($order_uuid, $mysql_connection = null) {
 global $get_order_items_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("order_items" => array(), "status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($get_order_items_query_template, $order_uuid));
 if (!$mysql_result) {
  return array("order_items" => array(), "status" => 1);
 }

 $order_items = array();
 for ($i = 0; $i < $mysql_result->num_rows; ++$i) {
  $row = $mysql_result->fetch_row();
  $product_listing_uuid = bin2hex($row[0]);
  $order_items[] = new order_item($row[1], $row[2] / 100.0, $row[3], "/db/products/$product_listing_uuid/image.png");
 }

 $mysql_result->free_result();
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 return array("order_items" => $order_items, "status" => 0);
}

?>