<?php //Checking if the user is logged in or not.
   session_start();
   if ((isset($_SESSION["sessionID"])) && ($_SESSION['sessionActivated'] == "0")) { //If the user is logged in but the email is not activated.
     header('Location: https://www.haxstar.com/?Alert=verifyEmail');
     exit();
   } else if (!isset($_SESSION["sessionID"])) { //If the user is not logged in.
     header('Location: https://www.haxstar.com');
     exit();
   }
?>
