<?php
   include $_SERVER['DOCUMENT_ROOT'] . '/repeated/header.php';
   include $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
?>
<style>
   body {
   background-color: pink;
   }
</style>
<div class="container-fluid">
   <div class="spinner-grow text-muted"></div>
   <div class="spinner-grow text-primary"></div>
   <div class="spinner-grow text-success"></div>
   <div class="spinner-grow text-info"></div>
   <div class="spinner-grow text-warning"></div>
   <div class="spinner-grow text-danger"></div>
   <div class="spinner-grow text-secondary"></div>
   <div class="spinner-grow text-dark"></div>
   <div class="spinner-grow text-light"></div>
   <h1 style="color:red;"> Welcome! - Here we will debug our Database visually &#9749;</h1>
   <h1 style="color:purple;"> CLICK <a href="https://haxstar.com/assets/debug.php" target="_blank"> >*>*>HERE<*<*< </a> TO VIEW THE TABLE CONTENTS</h1>
   <h2 style="color:blue;">Here are the full columns of all the tables:</h2>
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
      $sqlTableCount = "SELECT COUNT(*) AS Total FROM $table[$j]";
      $resultCount = $conn->query($sqlTableCount);
      echo "<br><h3> Table Name: <span style='color:red;'>{$table[$j]}</span></h3>";

      if ($row = $resultCount->fetch_assoc()) {
         echo "<h3> Total Rows: <span style='color:red;'>{$row['Total']}</span></h3>";
      }

      $sql = "SHOW FULL COLUMNS FROM $table[$j]";
      $result = $conn->query($sql);
      ?>
   <table class="table table-dark table-striped table-hover">
   <?php
      $i = 0;
      while($row = $result->fetch_assoc()) {
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
</div>
