<?php

require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$get_product_from_product_listing_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_product_from_product_listing.sql");
function get_product_name_from_product_listing($product_listing_uuid, $mysql_connection = null) {
 global $get_product_from_product_listing_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("name" => "", "status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($get_product_from_product_listing_query_template, $product_listing_uuid));
 if (!$mysql_result || $mysql_result->num_rows == 0) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("name" => "", "status" => 1);
 }

 $row = $mysql_result->fetch_row();
 $name = $row[2];

 $mysql_result->free_result();
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 return array("name" => $name, "status" => 0);
}

?>