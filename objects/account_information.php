<?php

class account_information {
 public $name;
 public $email;
 public $cellphone;
 public $address;
 public $username;
 public $password;
 public $profile_url;

 function __construct($name="", $email="", $cellphone="", $address="", $username="", $password="", $profile_url="/res/profile.png") {
  $this->name = $name;
  $this->email = $email;
  $this->cellphone = $cellphone;
  $this->address = $address;
  $this->username = $username;
  $this->password = $password;
  $this->profile_url = $profile_url;
 }
};

?>