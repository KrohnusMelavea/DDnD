<?php

require_once("server_scripts/debug_log.php");
require_once("objects/product_listing_image.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$product_listing_images_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/product_listing_images.sql");
function get_product_listing_images($uuid, $mysql_connection = null) {
 global $product_listing_images_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array(new product_listing_image());
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($product_listing_images_template, $uuid));
 if (!$mysql_result->num_rows) {
  debug_log("No Product Listing Images");
  return array(new product_listing_image());
 }
 $product_listing_images = array();
 for ($i = 0; $i < $mysql_result->num_rows; ++$i) {
  $mysql_row = $mysql_result->fetch_row();
  $product_listing_images[] = new product_listing_image($mysql_row[0], $mysql_row[1]);
 }

 $mysql_result->free_result();
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 return $product_listing_images;
}

?>