<?php

require_once("server_scripts/checkout.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 $result = checkout(bin2hex($_SESSION["account_uuid"]));
 $status = $result["status"];
 echo "{\"status\":$status}";
} else {
 echo "{\"status\":1}";
}

?>