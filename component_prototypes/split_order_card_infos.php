<?php

/*{str,str,str,int,int,int}[][]*/ function split_order_card_infos(/*{str,str,str,int,int,int}*/$order_card_list_infos, /*int*/$order_cards_per_section) {
 $order_card_list_infos_split = array();
 $order_card_list_infos_subset = array();
 for ($i = 0, $j = 0; $i < count($order_card_list_infos); ++$i, ++$j) {
  if ($j == $order_cards_per_section) {
   $j = 0;
   $order_card_list_infos_split[] = $order_card_list_infos_subset;
   $order_card_list_infos_subset = array();
  }
  $order_card_list_infos_subset[] = $order_card_list_infos[$i];
 }
 $order_card_list_infos_split[] = $order_card_list_infos_subset;
 return $order_card_list_infos_split;
}

?>