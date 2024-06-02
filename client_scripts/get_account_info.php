<?php

require("server_scripts/get_account_info.php");

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}
if (isset($_SESSION["account_uuid"])) {
 echo json_encode(get_object_vars(get_account_info($_SESSION["account_uuid"])));
} else {
 echo json_encode(get_object_vars(new account_info()));
}

?>