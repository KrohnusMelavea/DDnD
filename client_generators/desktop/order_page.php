<?php

require_once("server_generators/desktop/order_list.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 echo generate_order_list(bin2hex($_SESSION["account_uuid"]));
} else {
 header("location: /login");
}

?>