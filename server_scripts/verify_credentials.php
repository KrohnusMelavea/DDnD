<?php

require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");
require_once("server_scripts/debug_log.php");

$verify_credentials_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/verify_credentials.sql");
function verify_credentials($username, $password, $mysql_connection = null) {
 global $verify_credentials_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);

 if (!$mysql_connection_created_success) {
  debug_log("Failed MySQL Connection Creation");
  return array("account_uuid" => null, "status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($verify_credentials_query_template, $username, $password));
 $verified = $mysql_result->num_rows > 0;
 if ($verified) {
  debug_log("Login: {username: $username, password: $password}");
  $account_uuid = $mysql_result->fetch_row()[0];
  $mysql_result->free_result();
 } else {
  debug_log("Failed Login {username: $username, password: $password}");
  $account_uuid = null;
 }
 
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 return array("account_uuid" => $account_uuid, "status" => 0);
}

?>