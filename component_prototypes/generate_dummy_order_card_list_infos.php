<?php

require("generate_dummy_order_card_list_info.php");

/*{{dtm,dtm,int},{str,str,str,int,int,int,dtm}[]}[]*/ function generate_dummy_order_card_list_infos(/*int*/$order_card_list_count, /*int*/$order_cards_per_list) {
 $order_card_list_infos = array();
 for ($i = 0; $i < $order_card_list_count; ++$i) {
  $order_card_list_infos[] = generate_dummy_order_card_list_info($order_cards_per_list);
 }
 return $order_card_list_infos;
}

?>