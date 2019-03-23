<?php //The connection configuration to the database
   $host = "localhost";
   $dbname = "neeham_twitter";
   $user = "neeham_Soen341";
   $pass = "Soen341";
   $conn = new mysqli($host, $user, $pass, $dbname);
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
?>
