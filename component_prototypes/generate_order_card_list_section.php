<?php

require("generate_order_card.php");

$order_card_list_section_template = file_get_contents("order_card_list_section_template.html");
/*str*/ function generate_order_card_list_section(/*{str,str,str,int,int,int}[]*/$order_card_infos, /*int*/$section_index, /*int*/$section_count) {
 global $order_card_list_section_template;
 $generated_order_card_section = "";
 foreach ($order_card_infos as &$order_card_info) {
  $generated_order_card_section = $generated_order_card_section . generate_order_card(
   $order_card_info["product_url"],
   $order_card_info["product_image_url"],
   $order_card_info["product_title"],
   $order_card_info["product_price"],
   $order_card_info["product_quantity"],
   $order_card_info["product_status"]
  ) . "\n";
 }
 return sprintf($order_card_list_section_template, 
  $section_index, 
  ($section_index - 1 < 0) ? ($section_count - 1) : ($section_index - 1),
  $generated_order_card_section,
  ($section_index + 1) % $section_count,
 );
}

?>