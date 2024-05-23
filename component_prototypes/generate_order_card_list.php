<?php

require("generate_order_card_list_section.php");
require("split_order_card_infos.php");

$order_card_list_template = file_get_contents("order_card_list_template.html");
/*str*/ function generate_order_card_list(/*{{dtm,dtm,int},{str,str,str,int,int,int,dtm}[]}*/$order_card_list_info, /*int*/$list_index, /*int*/$order_cards_per_section) {
 global $order_card_list_template;
 $order_card_infos_split = split_order_card_infos($order_card_list_info["order_card_infos"], $order_cards_per_section);
 $order_card_list_sections = "";
 for ($i = 0; $i < count($order_card_infos_split); ++$i) {
  $order_card_list_sections = $order_card_list_sections . generate_order_card_list_section(
   $order_card_infos_split[$i], $list_index, $i, count($order_card_infos_split));
 }
 return sprintf($order_card_list_template, $order_card_list_sections);
}

?>