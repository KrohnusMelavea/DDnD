<?php

require_once("server_scripts/get_order_status_enum_string.php");

$order_info_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/order_info.html");
function generate_order_info($order_info, $unique_quantity, $quantity, $price) {
 global $order_info_template;

 return sprintf($order_info_template, $order_info->uuid, $order_info->order_date, get_order_status_enum_string($order_info->status), $order_info->address, $unique_quantity, $quantity, $price);
}

?>