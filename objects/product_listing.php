<?php

require_once("objects/product_listing_image.php");

class product_listing {
 public $uuid;
 public $stock;
 public $price;
 public $start_date;
 public $images;

 function __construct($uuid, $stock = 1, $price = 1, $start_date = null, $images = array(new product_listing_image())) {
  $this->uuid = $uuid;
  $this->stock = $stock;
  $this->price = $price;
  $this->start_date = $start_date;
  $this->images = $images;
 }
}

?>