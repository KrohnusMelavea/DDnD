<?php

require_once("server_scripts/add_credentials.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}
if (isset($_SESSION["account_uuid"])) {
 echo "{\"status\":0}";
} else {
 $post = file_get_contents("php://input", true);
 if (isset($post["sUsername"]) && isset($post["sPassword"])) {
  echo (string)add_credentials($post["sUsername"], $post["sPassword"])["status"];
 } else {
  echo "{\"status\":2}";
 }
}

?>