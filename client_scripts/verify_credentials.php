<?php

require_once("server_scripts/verify_credentials.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 echo "{\"status\":0}";
} else {
 $post = json_decode(file_get_contents("php://input"), TRUE);
 if (isset($post["sUsername"]) && isset($post["sPassword"])) {
  ["account_uuid" => $account_uuid, "status" => $status] = verify_credentials($post["sUsername"], $post["sPassword"]);
  if ($account_uuid != null) {
   $_SESSION["account_uuid"] = $account_uuid;
  }
  echo "{\"status\":$status}";
 } else {
  echo "{\"status\":2}";
 }
}
 



?>