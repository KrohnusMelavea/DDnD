<?php

require_once("server_generators/desktop/order_page.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 echo generate_order_page(bin2hex($_SESSION["account_uuid"]));
} else {
 header("location: /login");
}

?>