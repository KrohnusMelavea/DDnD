<?php

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (!isset($_SESSION["account_uuid"])) {
 header("Location: /login");
} else {
 include('index.html');
}

?>

