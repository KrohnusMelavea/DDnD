<?php

require("objects/product_listing.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

$product_listings_page_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/product_listings_page.php");
function get_product_listings($page, $products_per_page) {
 global $product_listings_page_template;

 $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);
 if ($mysql_connection->connect_errno) {
  return array();
 }

 $start_index = $page * $products_per_page;
 $end_index = ($page + 1) * $products_per_page;
 $product_listings_page_query = sprintf($product_listings_page_template, $start_index, "iPrice", $end_index, $end_index + 1);
 $mysql_product_listing_result = mysqli_query($mysql_connection, $product_listings_page_query);
 if ($mysql_product_listing_result->num_rows == 0) {
  return array();
 }

 $product_listings = array();
 for ($i = 0; $i < $mysql_product_listing_result->num_rows; ++$i) {
  //$mysql_product_result = mysqli_query($mysql_connection, $product_query);
  $mysql_product_listing_result_row = $mysql_product_listing_result->fetch_row();
  $product_listings[] = new product_listing(
   $mysql_product_listing_result_row[2],
   $mysql_product_listing_result_row[3],
   $mysql_product_listing_result_row[4]);
 }

 $mysql_product_listing_result->free_result();
 $mysql_connection->close();

 return $product_listings;
}

?>