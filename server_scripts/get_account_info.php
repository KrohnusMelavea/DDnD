<?php

require("objects/account_info.php");

function get_account_info($account_uuid) {
 $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);

 if ($mysql_connection->connect_errno) {
  $account_info = new account_info();
 } else {
  $a = bin2hex($account_uuid);
  $mysql_result = mysqli_query($mysql_connection, "SELECT * FROM TB_Profiles WHERE TB_Profiles.vUUID = X'$a'");

  if ($mysql_result->num_rows == 0) {
   $account_info = new account_info();
  } else {
   $account_info = new account_info($profile_url = "/db/userdata/$a/profile.png");
  }

  $mysql_result->free_result();
  $mysql_connection->close();
 }

 return $account_info;
}

?>