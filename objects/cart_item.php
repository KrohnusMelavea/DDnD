<?php

class cart_item {
 public $uuid;
 public $product_listing_uuid;
 public $quantity;

 function __construct($uuid, $product_listing_uuid, $quantity=1) {
  $this->uuid = $uuid;
  $this->product_listing_uuid = $product_listing_uuid;
  $this->quantity = $quantity;
 }
}

?>