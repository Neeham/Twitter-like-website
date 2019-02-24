<?php
session_start();
if (!isset($_SESSION["session_user"])) { //Not logged in, redirected to login page
    header('Location: https://www.haxstar.com');
    exit();
} else if ((isset($_SESSION["session_user"])) && ($_SESSION['session_activated'] == "0")) { //Logged in but email not activated, redirected to login page
    header('Location: https://www.haxstar.com/?Alert=verifyEmail');
    exit();
}
?>
