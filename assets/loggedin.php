<?php
session_start();
if (!isset($_SESSION["sessionUsername"])) { //Not logged in, redirected to login page
    header('Location: https://www.haxstar.com');
    exit();
} else if ((isset($_SESSION["sessionUsername"])) && ($_SESSION['session_activated'] == "0")) { //Logged in but email not activated, redirected to login page
    header('Location: https://www.haxstar.com/?Alert=verifyEmail');
    exit();
}
?>
