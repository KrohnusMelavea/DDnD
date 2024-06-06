<?php

require_once("server_generators/cart_page.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}
if (isset($_SESSION["account_uuid"])) {
 if (isset($_GET["page"])) {
  echo generate_cart_page(bin2hex($_SESSION["account_uuid"]), (int)$_GET["page"], 5);
 } else {
  echo generate_cart_page(bin2hex($_SESSION["account_uuid"]), 0, 5);
 }
} else {
 echo "";
}

?>