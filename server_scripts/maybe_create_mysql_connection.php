<?php

function maybe_create_mysql_connection($mysql_connection = null) {
 if ($mysql_connection == null) {
  $mysql_connection = new mysqli("localhost", "root", null, "DB_DDnD", null, null);
  if ($mysql_connection->connect_errno) {
   return array("mysql_connection" => $mysql_connection, "created" => false, "success" => false);
  }
  return array("mysql_connection" => $mysql_connection, "created" => true, "success" => true);
 }
 return array("mysql_connection" => $mysql_connection, "created" => false, "success" => true);
}

?>