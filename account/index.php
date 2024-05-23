<?php
session_start();

if (!isset($_SESSION["uuid"])) {
    header("location: /ddnd/login/index.php");
} else {
    include('index.html');
}

?>

