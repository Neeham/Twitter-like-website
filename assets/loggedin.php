<?php
session_start();
if (!isset($_COOKIE["cookieID"]) && !isset($_SESSION["sessionID"])) { // Cookie and session not set, redirect to index
  header('Location: https://www.haxstar.com');
  exit();
} else if ((isset($_COOKIE["cookieID"]) && ($_COOKIE["cookieActivated"] == "0")) || ((isset($_SESSION["sessionID"])) && ($_SESSION['sessionActivated'] == "0"))) { //Cookie or session is set but account not activated, redirect to index
    header('Location: https://www.haxstar.com/?Alert=verifyEmail');
    exit();
} else if (isset($_COOKIE["cookieID"]) && isset($_COOKIE["cookieUsername"]) && isset($_COOKIE["cookieActivated"]) && ($_COOKIE["cookieActivated"] == "1") && isset($_COOKIE["cookieLoggedIn"])) { //If cookie is set and account is activated, set session.
  $_SESSION["sessionID"]        = $_COOKIE["cookieID"];
  $_SESSION["sessionUsername"]  = $_COOKIE["cookieUsername"];
  $_SESSION["sessionActivated"] = $_COOKIE["cookieActivated"];
  $_SESSION["sessionLastLoggedIn"]     = $_COOKIE["cookieLoggedIn"];
}
?>
