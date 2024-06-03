<?php

require("server_scripts/get_product_listings.php");

$product_listings_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/product_listings.html");
function generate_product_listings($page, $products_per_page) {
 global $product_listings_template;
 $product_listings = get_product_listings($page, $products_per_page);
 return sprintf($product_listings_template);
}

?>