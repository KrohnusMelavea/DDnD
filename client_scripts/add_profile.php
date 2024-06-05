<?php

require_once("server_scripts/add_profile.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}
if (isset($_SESSION["account_uuid"])) {
 echo "{\"status\":0}";
} else {
 $post = json_decode(file_get_contents("php://input"), true);
 if (isset($post["sName"]) && isset($post["sEmail"]) && isset($post["sCellphone"]) && isset($post["sAddress"]) && isset($post["sUsername"]) && isset($post["sPassword"])) {
  ["status" => $status] = add_profile($post["sName"], $post["sEmail"], $post["sCellphone"], $post["sAddress"], $post["sUsername"], $post["sPassword"]);
  echo "{\"status\":$status}";
 } else {
  echo "{\"status\":2}";
 }
}

?>