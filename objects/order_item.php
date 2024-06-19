<?php

class order_item {
 public $name;
 public $price;
 public $quantity;
 public $image_url;

 function __construct($name, $price, $quantity, $image_url = "/res/no_image.png") {
  $this->name = $name;
  $this->price = $price;
  $this->quantity = $quantity;
  $this->image_url = $image_url;
 }
}

?>