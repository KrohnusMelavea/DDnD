<?php

function maybe_destroy_mysql_connection($mysql_connection, $created = false) {
 if ($created) {
  $mysql_connection->close();
 }
}

?>