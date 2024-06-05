<?php

require_once("objects/product_info.php");
require_once("objects/product_listing.php");

class product_listing_joined {
 public $product_uuid;
 public $name;
 public $store;
 public $description;
 public $listing_uuid;
 public $stock;
 public $price;
 public $start_date;
 public $images;

 function __construct($product_info, $product_listing) {
  $this->product_uuid = $product_info->uuid;
  $this->name = $product_info->name;
  $this->store = $product_info->store;
  $this->description = $product_info->description;
  $this->listing_uuid = $product_listing->uuid;
  $this->stock = $product_listing->stock;
  $this->price = $product_listing->price;
  $this->start_date = $product_listing->start_date;
  $this->images = $product_listing->images;
 }
}

?>