<?php

function verify_credentials($username, $password) {
 $result = 0;
 $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);

 if ($mysql_connection->connect_errno) {
  $result = 2;
 } else {
  $mysql_result = mysqli_query($mysql_connection, "SELECT TB_Profiles.vUUID FROM TB_Profiles WHERE TB_Profiles.sUsername = '$username' AND TB_Profiles.sPassword = '$password'");
  
  if ($mysql_result->num_rows == 0) {
   $result = 1;
  } else {
   $_SESSION["account_uuid"] = $mysql_result->fetch_row()[0];
  }

  $mysql_result->free_result();
  $mysql_connection->close();
 }
 
 return $result;
}

?>