<?php
session_start();
if (isset($_COOKIE["cookieID"])) {
  $_SESSION["sessionID"]               = $_COOKIE["cookieID"];
  $_SESSION["sessionUsername"]         = $_COOKIE["cookieUsername"];
  $_SESSION["sessionActivated"]        = $_COOKIE["cookieActivated"];
  $_SESSION["sessionLastLoggedIn"]     = $_COOKIE["cookieLoggedIn"];
}

if ((isset($_SESSION["sessionID"])) && ($_SESSION['sessionActivated'] == "0")) {
  header('Location: https://www.haxstar.com/?Alert=verifyEmail');
  exit();
} else if (!isset($_SESSION["sessionID"])) {
  header('Location: https://www.haxstar.com');
  exit();
}
?>
