<?php

$navigation_bar_template = file_get_contents("$_SERVER[DOCUMENT_ROOT]/ddnd/navigation_bar_template.html");
/*str*/ function generate_navigation_bar(/*str*/$pfp_url, /*int*/$card_item_count) {
 global $navigation_bar_template;
 return sprintf($navigation_bar_template, $pfp_url, $card_item_count);
}

?>