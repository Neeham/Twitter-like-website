<?php include '../assets/config.php'; ?>
<h1 style="color:red;"> Welcome! - Here we will debug our Database :)</h1>
<h3 style="color:blue;">Here is what I found on the database:</h3>

<?php
//Variable
$table = array(); //Array holding all the tables found in our database

//Storing all the tables found on the Database into an array caled table
$sql = "SHOW TABLES";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
while ($row = mysqli_fetch_row($result)) {
   $table[] = $row[0];
}

//*************************** Printing all the Table and it's data found on the Database ***************************
$j = 0;
while ($j <= 2) {
echo "<br>";
echo "Table Name: {$table[$j]}";

$sql = "SELECT * FROM $table[$j]";
$result = $conn->query($sql);

echo "<table border='1'>";
$i = 0;
while($row = $result->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
$j++;
}


//Function to Encrypte a Password
function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}

//Function to Decrypte a Password
function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

/* this is the query to insert into database, if you uncomment and land on this page, it will execute the query :P (Register user)
$pass = '1234qwe'; //hardcoding a password :P
$secured_password = generateHash($pass); //hashing the password
$sql = "INSERT INTO User (firstName,lastName,username,password,email) VALUES ('Neeham','Khalid','Neeham','$secured_password','Neehamk@gmail.com')";
$row = $conn->query($sql);
*/

/* Verifying if user exists (login page)
*/

/* Updating Database (change email/pass etc...)
*/

/* Deleting from datbase (deleting an account or tweet etc..)
*/
?>
