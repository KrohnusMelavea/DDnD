<?php

require_once("objects/cart_item.php");
require_once("server_scripts/debug_log.php");
require_once("server_scripts/get_product_listing_images.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$get_cart_page_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_cart_page.sql");
function get_cart_page($account_uuid, $page, $cart_items_per_page, $mysql_connection = null) {
 global $get_cart_page_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array();
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($get_cart_page_query_template, $account_uuid, "iPrice", "ASC", $cart_items_per_page, $page * $cart_items_per_page));
 if ($mysql_result->num_rows == 0) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array();
 }
 
 $cart_page = array();
 for ($i = 0; $i < $mysql_result->num_rows; ++$i) {
  $cart_page_row = $mysql_result->fetch_row();
  $cart_page[] = new cart_item(bin2hex($cart_page_row[0]), $cart_page_row[1], $cart_page_row[2], $cart_page_row[3], $cart_page_row[4], get_product_listing_images(bin2hex($cart_page_row[0]), $mysql_connection)[0]->url);
 }

 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 return $cart_page;
}

?>