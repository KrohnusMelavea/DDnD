<?php

$navigation_bar_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/templates/navigation_bar.html");
function generate_navigation_bar($pfp_url, $cart_item_count) {
 global $navigation_bar_template;
 return sprintf($navigation_bar_template, $pfp_url, $cart_item_count);
}

?>