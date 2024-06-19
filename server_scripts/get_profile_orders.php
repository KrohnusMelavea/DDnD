<?php

require_once("objects/order_info.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$get_profile_orders_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/get_profile_orders.sql");
function get_profile_orders($account_uuid, $mysql_connection = null) {
 global $get_profile_orders_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("orders" => array(), "status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($get_profile_orders_query_template, $account_uuid));
 if (!$mysql_result) {
  return array("orders" => array(), "status" => 1);
 }

 $orders = array();
 for ($i = 0; $i < $mysql_result->num_rows; ++$i) {
  $row = $mysql_result->fetch_row();
  $orders[] = new order_info(bin2hex($row[0]), $row[1], $row[2], $row[3]);
 }

 $mysql_result->free_result();
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 
 return array("orders" => $orders, "status" => 0);
}

?>