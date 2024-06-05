<?php

function debug_log($content) {
 file_put_contents("php://stderr", $content . "\n");
}

?>