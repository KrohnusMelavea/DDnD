<?php

session_start();

if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["uuid"])) {
    unset($_SESSION["uuid"]);
    echo "{\"status\":0}";  /* Success */
} else {
    echo "{\"status\":1}";  /* Failure */
}

?>