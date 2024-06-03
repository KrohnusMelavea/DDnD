<?php

class product_listing_image {
 public $url;
 public $caption;

 function __construct($url = "/res/no_image.png", $caption = "") {
  $this->url = $url;
  $this->caption = $caption;
 }
}

?>