<?php

require_once("objects/account_information.php");
require_once("server_scripts/maybe_create_mysql_connection.php");
require_once("server_scripts/maybe_destroy_mysql_connection.php");

function get_account_information($account_uuid, $mysql_connection = null) {
 ["mysql_connection" => $mysql_connection, "created" => $mysql_connection_created, "success" => $mysql_connection_created_success] = maybe_create_mysql_connection($mysql_connection);
 if (!$mysql_connection_created_success) {
  return array("account_information" => new account_information(), "status" => 1);
 }

 $mysql_result = mysqli_query($mysql_connection, "SELECT * FROM TB_Profiles WHERE TB_Profiles.vUUID = UNHEX('$account_uuid')");
 if (!$mysql_result || $mysql_result->num_rows == 0) {
  return array("account_information" => new account_information(), "status" => 1);
 }

 $mysql_result_row = $mysql_result->fetch_row();
 $account_information =  new account_information($mysql_result_row[1], $mysql_result_row[2], $mysql_result_row[3], $mysql_result_row[4], $mysql_result_row[5], $mysql_result_row[6], "");
 if (file_exists("$_SERVER[DOCUMENT_ROOT]/db/profiles/$account_uuid/profile.png")) {
  $account_information->profile_url = "/db/profiles/$account_uuid/profile.png";
 }

 $mysql_result->free_result();
 maybe_destroy_mysql_connection($mysql_connection, $mysql_connection_created);

 return array("account_information" => $account_information, "status" => 0);
}

?>