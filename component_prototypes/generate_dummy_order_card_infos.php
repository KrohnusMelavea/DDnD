<?php

require("generate_dummy_order_card_info.php");

/*{str,str,str,int,int,int}[]*/ function generate_dummy_order_card_infos(/*int*/$count) {
 $dummy_order_card_infos = array();
 for ($i = 0; $i < $count; ++$i) {
  $dummy_order_card_infos[] = generate_dummy_order_card_info();
 }
 return $dummy_order_card_infos;
}

?>