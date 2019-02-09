<?php
session_start();
if(!isset($_SESSION["session_user"])){
header('Location: https://www.haxstar.com');
exit();
}
?>
