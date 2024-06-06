@echo off
:start
php-cgi -b 127.0.0.1:9000 -c c:/vendor/php/php.ini-development
echo "php webserver crashed. restarting...";
goto :start