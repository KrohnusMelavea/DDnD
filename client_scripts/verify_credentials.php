<?php

require("server_scripts/verify_credentials.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

if (!isset($_SESSION["account_uuid"])) {
 $post = json_decode(file_get_contents("php://input"), TRUE);
 $result = verify_credentials($post["sUsername"], $post["sPassword"]);
 echo "{\"status\":$result}";
} else {
 echo "{\"status\":2}";
}



?>