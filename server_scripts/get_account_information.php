<?php

require_once("objects/account_information.php");

function get_account_information($account_uuid) {
 $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);

 if ($mysql_connection->connect_errno) {
  $account_info = new account_info();
 } else {
  $mysql_result = mysqli_query($mysql_connection, "SELECT * FROM TB_Profiles WHERE TB_Profiles.vUUID = UNHEX('$account_uuid')");

  if ($mysql_result->num_rows == 0) {
   $account_info = new account_info();
  } else {
   $mysql_result_row = $mysql_result->fetch_row();
   if (file_exists("$_SERVER[DOCUMENT_ROOT]/db/profiles/$account_uuid/profile.png")) {
    $account_info = new account_info($mysql_result_row[1], $mysql_result_row[2], $mysql_result_row[3], $mysql_result_row[4], $mysql_result_row[5], $mysql_result_row[6], "/db/profiles/$account_uuid/profile.png");
   } else {
    $account_info = new account_info();
   }
  }

  $mysql_result->free_result();
  $mysql_connection->close();
 }

 return $account_info;
}

?>