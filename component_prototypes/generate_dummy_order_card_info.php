<?php

/*{str,str,str,int,int,int}*/ function generate_dummy_order_card_info() {
 return array(
  "product_url" => "#",
  "product_image_url" => "res/dnd_dice.png",
  "product_title" => "D&D Dice Set",
  "product_price" => 10000,
  "product_quantity" => 3,
  "product_status" => 0,
  "product_delivery_date" => date_create_from_format("dd-mm-yyyy hh:mm:ss", "01/01/2000 12:00:00")
 );
}

?>