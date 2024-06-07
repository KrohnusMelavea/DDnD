<?php

require_once("server_scripts/deactivate_account.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 ["status" => $status] = deactivate_account(bin2hex($_SESSION["account_uuid"]));
 if ($status == 0) {
  unset($_SESSION["account_uuid"]);
 }
 echo "{\"status\":$status}";
}

?>