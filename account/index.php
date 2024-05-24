<?php
session_start();

if (!isset($_SESSION["uuid"])) {
    header("location: /ddnd/login");
} else {
    include('index.html');
}

?>

