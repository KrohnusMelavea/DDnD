<?php

class product_info {
 public $name;
 public $store;
 public $description;

 function __construct($name="", $store=0, $description="") {
  $this->name = $name;
  $this->store = $store;
  $this->description = $description;
 }
}

?>