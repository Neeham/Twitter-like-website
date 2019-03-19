<?php
session_start();
session_unset();
session_destroy();
setcookie("cookieID", "", time() - 3600, "/");
setcookie("cookieUsername", "", time() - 3600, "/");
setcookie("cookieActivated", "", time() - 3600, "/");
setcookie("cookieLoggedIn", "", time() - 3600, "/");
header('Location: https://www.haxstar.com');
exit();
?>
