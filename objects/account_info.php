<?php

class account_info {
 public $profile_url;
 public $name;
 public $email;
 public $cellphone;
 public $address;

 public function __construct($profile_url="/res/profile.png", $name="", $email="", $cellphone="", $address="") {
  $this->profile_url = $profile_url;
  $this->name = $name;
  $this->email = $email;
  $this->cellphone = $cellphone;
  $this->address = $address;
 }
};

?>