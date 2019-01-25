<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<title>Welcome to Twitter</title>
</head>
<body>
<h2>This is a Heading! <br><br> Also this is the page people will land on by default aka the index page!</h1>
<h1>Today we are: <?php echo date("l - F d, Y")?></h1>
</body>
Bla<br><br>
</html>

<form>
  First name:<br>
  <input type="text" name="firstname"><br>
  Last name:<br>
  <input type="text" name="lastname">
</form>
<?php
echo "Git, GitHub, Xampp, mySQL Database setup + html code and PHP code (server side) testing <br><br>";
$num = 3;
$num2 = 9;
$sum = $num + $num2;

/* The code to connect to the database! Reminder: Ask teammates about using a remote database to make our lifes easier!
//Have to put this portion of code in a seperate file named either config or database connection

   $host = "localhost:3306"; //put link of my remote database server if everyone agrees!
   $dbname = "neeham_haxstar";
   $user = "neeham_elbowham";
   $pass = "REPLACE_ME";
   try {
           $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
           $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
   }
   catch(PDOException $e) {
          echo "ERROR: ".$e->getMessage();
   }
*/
   echo "Testing: The sum of $num and $num2 is $sum."
?>
