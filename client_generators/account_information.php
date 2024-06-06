<?php

require_once("server_generators/account_information.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 ["account_information" => $account_information, "status" => $status] = generate_account_information(bin2hex($_SESSION["account_uuid"]));
 echo $account_information;
} else {
 header("location: /login");
}

?>