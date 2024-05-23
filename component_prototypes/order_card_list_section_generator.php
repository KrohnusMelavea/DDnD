<?php

require("generate_dummy_order_card_infos.php");
require("generate_order_card_list_section.php");

echo generate_order_card_section(generate_dummy_order_card_infos(10), 0, 3);

?>