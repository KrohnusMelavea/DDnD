<?php

class order_info {
 public $uuid;
 public $address;
 public $status;
 public $order_date;

 function __construct($uuid, $address, $status, $order_date) {
  $this->uuid = $uuid;
  $this->address = $address;
  $this->status = $status;
  $this->order_date = $order_date;
 }
}

?>