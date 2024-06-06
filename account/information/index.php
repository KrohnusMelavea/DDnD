<?php

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 include("index.html");
} else {
 header("location: /login");
}

?>