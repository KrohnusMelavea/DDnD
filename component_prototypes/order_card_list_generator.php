<?php

require("generate_order_card_list.php");
require("generate_dummy_order_card_list_info.php");

$order_card_list_section_count = 3;
$order_cards_per_section = 10;

echo generate_order_card_list(generate_dummy_order_card_list_info(30), 10);

?>