<?php 

require("generate_order_card_lists.php");
require("generate_dummy_order_card_list_infos.php");

echo generate_order_card_lists(generate_dummy_order_card_list_infos(2, 30), 10);

?>