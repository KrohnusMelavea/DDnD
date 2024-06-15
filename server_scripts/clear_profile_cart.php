<?php

require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$clear_profile_cart_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/clear_profile_cart.sql");
function clear_profile_cart($account_uuid, $mysql_connection = null) {
 global $clear_profile_cart_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($clear_profile_cart_query_template, $account_uuid));
 if (!$mysql_result) {
  return array("status" => 1);
 }

 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 return array("status" => 0);
}

?>