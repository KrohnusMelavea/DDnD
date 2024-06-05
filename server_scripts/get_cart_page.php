<?php

require_once("objects/cart_item.php");
require_once("server_scripts/debug_log.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$get_cart_items_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_cart_items.php");
function get_cart_items($account_uuid, $page, $products_per_page) {
 
}

?>