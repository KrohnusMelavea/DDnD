<?php

require("generate_order_card_list.php");

$order_card_lists_template = file_get_contents("order_card_lists_template.html");
/*str*/ function generate_order_card_lists(/*{{dtm,dtm,int},{str,str,str,int,int,int,dtm}[]}[]*/$order_card_list_infos, /*int*/$order_cards_per_list_section) {
 $order_card_lists = "";
 for ($i = 0; $i < count($order_card_list_infos); ++$i) {
  $order_card_lists = $order_card_lists . generate_order_card_list($order_card_list_infos[$i], $order_cards_per_list_section);
 }
 return sprintf($order_card_lists_template, $order_card_lists);
}

?>