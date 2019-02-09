<?php
/*
FRONTEND: DO NOT TOUCH THIS PAGE

I made this page for backend to trace any error visual instead of going through the codes.

Backend: You can see what's going on in the database whenever you perform database actions: create/login/post/like
*/
?>

<?php include '../assets/config.php'; ?>
<h1 style="color:red;"> Welcome! - Here we will debug our Database :)</h1>
<h3 style="color:blue;">Here is what I found on the database:</h3>

<?php
//Variable
$table = array(); //Array holding all the tables found in our database

//Storing all the tables found on the Database into an array called table
$sql = "SHOW TABLES";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_row($result)) {
    $table[] = $row[0];
}

//*************************** Printing all the Table and it's data found on the Database ***************************
$j = 0;
while ($j < sizeof($table)) {
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

mysqli_close($conn);
?>
