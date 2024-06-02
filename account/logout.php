<?php

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (isset($_SESSION["account_uuid"])) {
 unset($_SESSION["account_uuid"]);
 echo "{\"status\":0}";  /* Success */
} else {
 echo "{\"status\":1}";  /* Failure */
}

?>