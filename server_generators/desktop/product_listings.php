<?php

require_once("server_scripts/get_product_listings.php");
require_once("server_generators/desktop/product_listing.php");

$product_listings_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/product_listings.html");
function generate_product_listings($page, $products_per_page) {
 global $product_listings_template;

 $product_listings = get_product_listings($page, $products_per_page);
 if (!count($product_listings)) {
  return sprintf($product_listings_template, "");
 }

 $generated_product_listings = "";
 for ($i = 0; $i < count($product_listings); ++$i) {
  $generated_product_listings = $generated_product_listings . "\n" . generate_product_listing($product_listings[$i]);
 }

 return sprintf($product_listings_template, $generated_product_listings);
}

?>