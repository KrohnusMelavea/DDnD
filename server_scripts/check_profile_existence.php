<?php

require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$check_profile_existence_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/check_profile_existence.sql");
function check_profile_existence($username, $mysql_connection = null) {
 global $check_profile_existence_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("exists" => 0, "status" => 1);
 }

 $mysql_query = mysqli_query($mysql_connection, sprintf($check_profile_existence_query_template, $username));
 if (!$mysql_query) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("exists" => false, "status" => 1);
 }
 $exists = $mysql_query->fetch_row()[0] == 1;

 $mysql_query->free_result();
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 return array("exists" => $exists, "status" => 0);
}

?>