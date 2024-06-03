<?php

require_once("objects/product_listing_joined.php");
require_once("server_scripts/get_product_listing_images.php");

$product_listings_page_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/product_listings_page.sql");
function get_product_listings($page, $products_per_page, $mysql_connection = null) {
 global $product_listings_page_template;

 if ($mysql_connection == null) {
  $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);
  if ($mysql_connection->connect_errno) {
   return array();
  }
  $mysql_connection_supplied = false;
 } else {
  $mysql_connection_supplied = true;
 }

 $start_index = $page * $products_per_page;
 $end_index = ($page + 1) * $products_per_page;
 $product_listings_page_query = sprintf($product_listings_page_template, "iPrice", "ASC", $products_per_page, $page * $products_per_page);
 $mysql_product_listing_result = mysqli_query($mysql_connection, $product_listings_page_query);
 if (!$mysql_product_listing_result->num_rows) {
  return array();
 }

 error_log(sprintf("[DEBUG] Product Listing Count: %u", $mysql_product_listing_result->num_rows));
 error_log(sprintf("[DEBUG] Query: %s", $product_listings_page_query));

 $product_listings = array();
 for ($i = 0; $i < $mysql_product_listing_result->num_rows; ++$i) {
  $mysql_product_listing_result_row = $mysql_product_listing_result->fetch_row();
  $product_listings[] = new product_listing_joined(
   new product_info(
    $mysql_product_listing_result_row[2], 
    $mysql_product_listing_result_row[3], 
    $mysql_product_listing_result_row[4]),
   new product_listing(
    $mysql_product_listing_result_row[5], 
    $mysql_product_listing_result_row[6], 
    $mysql_product_listing_result_row[7], 
    get_product_listing_images(bin2hex($mysql_product_listing_result_row[0]), $mysql_connection))
  );
 }

 $mysql_product_listing_result->free_result();
 if (!$mysql_connection_supplied) {
  $mysql_connection->close();
 }
 
 return $product_listings;
}

?>