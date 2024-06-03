<?php

require_once("objects/product_listing_image.php");

$product_listing_images_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/product_listing_images.sql");
function get_product_listing_images($uuid, $mysql_connection = null) {
 global $product_listing_images_template;

 if ($mysql_connection == null) {
  $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);
  if ($mysql_connection->connect_errno) {
   return array(new product_listing_image());
  }
  $mysql_connection_supplied = false;
 } else {
  $mysql_connection_supplied = true;
 }

 $mysql_query = sprintf($product_listing_images_template, $uuid);
 $mysql_result = mysqli_query($mysql_connection, $mysql_query);
 if (!$mysql_result->num_rows) {
  return array(new product_listing_image());
 }
 $product_listing_images = array();
 for ($i = 0; $i < $mysql_result->num_rows; ++$i) {
  $mysql_row = $mysql_result->fetch_row();
  $product_listing_images[] = new product_listing_image($mysql_row[0], $mysql_row[1]);
 }

 $mysql_result->free_result();
 if (!$mysql_connection_supplied) {
  $mysql_connection->close();
 }

 return $product_listing_images;
}

?>