<?php

class product_info {
 public $uuid;
 public $name;
 public $store;
 public $description;

 function __construct($uuid, $name="", $store=0, $description="") {
  $this->uuid = $uuid;
  $this->name = $name;
  $this->store = $store;
  $this->description = $description;
 }
}

?>