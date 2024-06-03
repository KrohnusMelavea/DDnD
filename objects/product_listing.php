<?php

if (session_status() != PHP_SESSION_ACTIVE) {
 session_start();
}

class product_listing {
 public $stock;
 public $price;
 public $start_date;
 public $image_urls;

 function __construct($stock = 1, $price = 1, $start_date = null) {
  $this->stock = $stock;
  $this->price = $price;
  $this->start_date = $start_date;
 }
}

?>