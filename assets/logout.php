<?php
session_start();
session_unset();
session_destroy();
header('Location: https://www.haxstar.com');
exit();
?>
