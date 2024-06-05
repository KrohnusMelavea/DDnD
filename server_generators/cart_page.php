<?php

require_once("objects/cart_item.php");
require_once("server_generators/cart_item.php");
require_once("server_scripts/get_cart_page.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$cart_page_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/cart_page.html");
function generate_cart_page($account_uuid, $page, $cart_items_per_page, $mysql_connection = null) {
 global $cart_page_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return "";
 }

 $generated_cart_page = "";
 $cart_page = get_cart_page($account_uuid, $page, $cart_items_per_page);
 foreach ($cart_page as $cart_item) {
  $generated_cart_page = $generated_cart_page . "\n" . generate_cart_item($cart_item);
 }

 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 return sprintf($cart_page_template, $generated_cart_page);
}

?>