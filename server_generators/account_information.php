<?php

require_once("server_scripts/get_account_information.php");

$account_information_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/account_information.html");
function generate_account_information($account_uuid) {
 global $account_information_template;

 $account_information = get_account_information($account_uuid);

 return array("account_information" => sprintf($account_information_template, $account_information->name, $account_information->email, $account_information->cellphone, $account_information->address, $account_information->username, $account_information->password), "status" => 0);
}

?>