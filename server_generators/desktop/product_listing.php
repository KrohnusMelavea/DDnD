<?php

$product_listing_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/product_listing.html");
function generate_product_listing($product_listing) {
 global $product_listing_template;

 return sprintf($product_listing_template, $product_listing->images[0]->url, $product_listing->name, $product_listing->description, (float)$product_listing->price / 100.0, $product_listing->stock, bin2hex($product_listing->listing_uuid));
}

?>