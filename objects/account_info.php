<?php

class account_info {
 public $profile_url;

 public function __construct($profile_url="/res/profile.png") {
  $this->profile_url = $profile_url;
 }
};

?>