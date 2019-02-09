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
    <form class="form-signin" action="../assets/query" method="post">
      <h2 class="form-signin-heading">
        <?php echo _("Please Register")?>
      </h2>
      <input type="text" class="form-control" name="firstname" placeholder="<?php echo _("First Name")?>" required="" autofocus /><br>
      <input type="text" class="form-control" name="lastname" placeholder="<?php echo _("Last Name")?>" required=""/><br>
      <input type="text" class="form-control" name="username" placeholder="<?php echo _("User Name")?>" required=""/><br>
      <input type="password" class="form-control" name="password" placeholder="<?php echo _("Password")?>" required=""/><br>
      <input type="text" class="form-control" name="email" placeholder="<?php echo _("Email Address")?>" required=""/><br><br>
      <button class="btn btn-lg btn-primary btn-block" name="register" type="submit">
        <?php echo _("Register")?>
      </button><br>
    </form>
    <?php include '../repeated/footer.php';?>
  </body>
</html>
