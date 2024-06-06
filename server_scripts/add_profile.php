<?php

require_once("server_scripts/check_profile_existence.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

$add_new_profile_query_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/db/query_templates/add_new_profile.sql");
function add_profile($name, $email, $cellphone, $address, $username, $password, $mysql_connection = null) {
 global $add_new_profile_query_template;

 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("status" => 1);
 }

 ["exists" => $profile_exists, "status" => $status] = check_profile_existence($username, $mysql_connection);
 if ($status != 0) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("status" => 1);
 }

 if ($profile_exists) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("status" => 2);
 }

 $mysql_result = mysqli_query($mysql_connection, sprintf($add_new_profile_query_template, bin2hex(openssl_random_pseudo_bytes(16)), $name, $email, $cellphone, $address, $username, $password));
 if (!$mysql_result) {
  maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
  return array("status" => 1);
 }

 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);
 return array("status" => 0);
}

?>