<?php

require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$verify_credentials_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/verify_credentials.sql");
$add_new_credentials_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/add_new_credentials.sql");
function add_credentials($username, $password, $mysql_connection = null) {
 global $verify_credentials_query_template;
 global $add_new_credentials_query_template;

 [$mysql_connection, $mysql_connection_created, $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("success" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($verify_credentials_query_template, ));
}

?>