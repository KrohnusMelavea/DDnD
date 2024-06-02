<?php

session_start();

$mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", 3306, null);
if ($mysql_connection->connect_errno) {
 echo "{\"status\":2}"; /* Connection Error */
} else {
 $post = json_decode(file_get_contents("php://input"), TRUE);

 $username = $post["sUsername"];
 $password = $post['sPassword'];
 $mysql_result = mysqli_query($mysql_connection, "SELECT TB_Profiles.vUUID FROM TB_Profiles WHERE TB_Profiles.sUsername = '$username' AND TB_Profiles.sPassword = '$password'");
 if ($mysql_result->num_rows == 0) {
  echo "{\"status\":1}";
 } else {
  $_SESSION["account_uuid"] = $mysql_result->fetch_row()[0];
  echo "{\"status\":0}";
 }
 $mysql_result->free_result();
 $mysql_connection->close();
}

?>