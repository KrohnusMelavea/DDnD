<?php

class cart_item {
 public $product_listing_uuid;
 public $name;
 public $description;
 public $price;
 public $quantity;
 public $image_url;

 function __construct($product_listing_uuid, $name="", $description="", $price=1, $quantity=1, $image_url="/res/no_image.png") {
  $this->product_listing_uuid = $product_listing_uuid;
  $this->name = $name;
  $this->description = $description;
  $this->price = $price;
  $this->quantity = $quantity;
  $this->image_url = $image_url;
 }
}

?>