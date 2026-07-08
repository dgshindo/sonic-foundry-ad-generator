@echo off
echo Starting Sonic Foundry Ad Generator...
echo.
echo Open: http://127.0.0.1:8288
echo.
php -S 127.0.0.1:8288 -t public router.php
pause