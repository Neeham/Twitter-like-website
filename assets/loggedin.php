<?php
session_start();
if ((isset($_SESSION["sessionID"])) && ($_SESSION['sessionActivated'] == "0")) {
  header('Location: https://www.haxstar.com/?Alert=verifyEmail');
  exit();
} else if (!isset($_SESSION["sessionID"])) {
  header('Location: https://www.haxstar.com');
  exit();
}
?>
