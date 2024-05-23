<?php
session_start();

if (isset($_SESSION['uuid'])) {
    header("location: /ddnd/index.php");
} else {
    include('index.html');
}

?>

