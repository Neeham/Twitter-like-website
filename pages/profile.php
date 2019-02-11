<!DOCTYPE html>
<html lang="en">
<?php
include '../repeated/header.php';
include '../repeated/navbar.php';
include '../assets/alert.php';
include '../assets/query.php';
if (isset($_GET['errorInsert'])) {
    echo alert('error', 'Something went wrong (not entered in database). Please try again.');
}
if (isset($_GET['successfulInsert'])) {
    echo alert('success', 'Your Quack has successfully been posted! Happy Quacking!');
}
?>
<body id="profile">
   <div class="container">
      <div class="row">
         <div class="col-md-3 center-block"><a href="https://www.w3schools.com/html/html5_intro.asp">Learning how to html/css.</a></div>
         <div class="col-md-6 center-block" style="background-color:lavenderblush;">
            <form class="form-group" action="../assets/query" method="post">
               <h2> <label for="tweet">*Post a Quack</label> </h2>
               <textarea class="form-control" rows="4" name="tweet" maxlength="255" placeholder="<?php echo _("*Write your Quack here")?>"></textarea>
               <br>
               <button class="btn btn-lg btn-primary btn-block" name="postQuackBtn" type="submit"><?php echo _("*Quack")?></button><br>
               </button>
            </form>
         </div>
         <div class="col-md-3 center-block"><a href="https://www.w3schools.com/bootstrap4/bootstrap_grid_basic.asp">Learning how bootstrap works.</a></div>
      </div>
      <h3> <?php echo _("*Your Latest Quacks")?> </h3>
      <!-- //create method call to display user's Quack -->
      <?php echo printQuacks(); ?>  <!-- //giving error -->
   </div>
   <?php include '../repeated/footer.php';?>
</body>
</html>
