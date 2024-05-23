<?php

require("generate_dummy_order_card_infos.php");

/*{{dtm,dtm,int},{str,str,str,int,int,int,dtm}[]}*/ function generate_dummy_order_card_list_info(/*int*/$order_card_count) {
 return array(
  "header" => array(
   "payment_date" => date_create_from_format("dd-mm-yyyy hh:mm:ss", "01/01/2000 12:00:00"),
   "conclusion_date" => date_create_from_format("dd-mm-yyyy hh:mm:ss", "01/01/2000 12:00:00"),
   "order_status" => 0
  ),
  "order_card_infos" => generate_dummy_order_card_infos(30)
 );
}

?>