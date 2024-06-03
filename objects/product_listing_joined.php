<?php

require_once("objects/product_info.php");
require_once("objects/product_listing.php");

class product_listing_joined {
 public $name;
 public $store;
 public $description;
 public $stock;
 public $price;
 public $start_date;
 public $images;

 function __construct($product_info, $product_listing) {
  $this->name = $product_info->name;
  $this->store = $product_info->store;
  $this->description = $product_info->description;
  $this->stock = $product_listing->stock;
  $this->price = $product_listing->price;
  $this->start_date = $product_listing->start_date;
  $this->images = $product_listing->images;
 }
}

?>