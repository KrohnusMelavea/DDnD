<?php

require("get_pfp_url.php");
require("get_cart_item_count.php");
require("generate_navigation_bar.php");

if (session_status() == PHP_SESSION_ACTIVE) {
 if (isset($_SESSION["user_uuid"])) {
  echo generate_navigation_bar(get_pfp_url($_SESSION["user_uuid"]), get_cart_item_count($_SESSION["user_uuid"]));
 }
 else {
  echo generate_navigation_bar("/ddnd/res/profile.png", 0);
 }
}
else {
 session_start();
 echo generate_navigation_bar("/ddnd/res/profile.png", 0);
}

?>