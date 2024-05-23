<?php

if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['pfp_url'])) {
    echo $_SESSION['pfp_url'];
} else {
    echo "/ddnd/res/profile.png";
}

?>