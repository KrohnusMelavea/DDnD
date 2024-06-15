<?php

require_once("server_scripts/debug_log.php");
require_once("server_scripts/get_account_information.php");

$account_information_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/account_information.html");
function generate_account_information($account_uuid) {
 global $account_information_template;

 $result = get_account_information($account_uuid);

 return array("account_information" => sprintf($account_information_template, $result["account_information"]->name, $result["account_information"]->email, $result["account_information"]->cellphone, $result["account_information"]->address, $result["account_information"]->username, $result["account_information"]->password), "status" => $result["status"]);
}

?>