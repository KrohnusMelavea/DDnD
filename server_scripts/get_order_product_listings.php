<?php

require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$get_order_product_listings_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_order_product_listings.sql");
function get_order_product_listings($order_uuid, $mysql_connection = null) {
 global $get_order_product_listings_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("order_product_listings" => array(), "status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($get_order_product_listings_query_template, $order_uuid));
 if (!$mysql_result) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("order_product_listings" => array(), "status" => 1);
 }

 $order_product_listings = array();
 for ($i = 0; $i < $mysql_result->num_rows; ++$i) {
  $row = $mysql_result->fetch_row();
  $order_product_listings[] = array("uuid" => $row[0], "product_uuid" => $row[1], "price" => $row[3]);
 }

 $mysql_result->free_result();
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 return array("order_product_listings" => $order_product_listings, "status" => 0);
}

?>