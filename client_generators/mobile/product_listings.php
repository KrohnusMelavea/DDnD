<?php

require_once("server_generators/desktop/product_listings.php");

if (isset($_GET["page"])) {
 echo generate_product_listings((int)$_GET["page"], 5);
} else {
 echo generate_product_listings(0, 5);
}


?> 