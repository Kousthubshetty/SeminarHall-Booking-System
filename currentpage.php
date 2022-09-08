<?php
$protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
$root =   'http'.(!empty($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . "/displayhallbooking.php?viewid=";
echo $root;
?>