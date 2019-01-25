 <?php
 //Database connection

$host = "localhost:3306";
$dbname = "neeham_twitter";
$user = "neeham_Soen341";
$pass = "Soen341";
try {
    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "ERROR: ".$e->getMessage();

}
?>
