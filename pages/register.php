<!DOCTYPE html>
<html lang="en">
<?php
include '../repeated/header.php';
include '../assets/alert.php';
if (isset($_GET['errorNameExists'])) {
    echo alert('error', 'The username already exists. Please choose another username.');
}
?>
<body id="register">
   <div class = "container-fluid">
   <div class="row">
      <div class="col-md-4 center-block"></div>
      <div class="col-md-4 center-block" style="background-color:lavenderblush;">
         <form class="form-signin" action="../assets/query" method="post">
            <h2 class="form-signin-heading">
               <?php echo _("Please Register")?>
            </h2>
            <input type="text" class="form-control" name="firstname" placeholder="<?php echo _("First Name")?>" required="" autofocus /><br>
            <input type="text" class="form-control" name="lastname" placeholder="<?php echo _("Last Name")?>" required=""/><br>
            <input type="text" class="form-control" name="username" placeholder="<?php echo _("User Name")?>" required=""/><br>
            <input type="password" class="form-control" name="password" placeholder="<?php echo _("Password")?>" required=""/><br>
            <input type="text" class="form-control" name="email" placeholder="<?php echo _("Email Address")?>" required=""/><br><br>
            <button class="btn btn-lg btn-warning btn-block" name="register" type="submit">
            <?php echo _("Register")?>
            </button><br>
         </form>
         <button onclick="location.href = 'https://haxstar.com/';" class="btn btn-lg btn-primary btn-block" name="login"><?php echo _("Login")?></button><br>
      </div>
      <div class="col-md-4 center-block"></div>
   </div>
   <?php include '../repeated/footer.php';?>
</body>
</html>
