<!DOCTYPE html>
<html lang="en">
<?php
  require $_SERVER['DOCUMENT_ROOT'].'/repeated/header.php';
?>
<body id="register">
  <nav class="navbar navbar-expand-sm bg-warning navbar-light">
    <a class="navbar-brand" href="#">
      <img src="https://haxstar.com/images/logo/duck.png" width="30" height="30" class="d-inline-block align-top" alt="">
      <img src="https://haxstar.com/images/logo/Quacker.png" width="140" height="30" class="d-inline-block align-top" alt="">
    </a>
  </nav>
   <div class = "container-fluid">
   <div class="row">
      <div class="col-md-4 center-block"></div>
      <div class="col-md-4 center-block" style="background-color:#e6ecf0;">
         <form class="form-signin" action="../assets/query" method="post">
            <h2 class="form-signin-heading">
               <?php echo _("Please Register")?>
            </h2>
            <input type="text" class="form-control" name="firstname" placeholder="<?php echo _("First Name")?>" required="" autofocus /><br>
            <input type="text" class="form-control" name="lastname" placeholder="<?php echo _("Last Name")?>" required=""/><br>
            <input type="text" class="form-control" name="username" placeholder="<?php echo _("Username")?>" required=""/><br>
            <input type="password" class="form-control" name="password" placeholder="<?php echo _("Password")?>" required=""/><br>
            <input type="email" class="form-control" name="email" placeholder="<?php echo _("Email Address")?>" required=""/><br><br>
            <button class="btn btn-lg btn-warning btn-block" name="register" type="submit" disabled><?php echo _("Register - Disabled for Now")?></button><br>
         </form>
         <button onclick="location.href = 'https://haxstar.com/';" class="btn btn-lg btn-primary btn-block" name="login"><?php echo _("Login")?></button><br>
      </div>
      <div class="col-md-4 center-block"></div>
   </div>
   <?php require $_SERVER['DOCUMENT_ROOT'].'/repeated/footer.php';?>
</body>
</html>
