<?php
session_start();
if(isset($_SESSION["session_user"])){
header('Location: https://www.haxstar.com/pages/feed');
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include './repeated/header.php';
include './assets/alert.php';
if (isset($_GET['error'])) {
echo alert('error', 'Please verify Username and Password.');
}
?>
  <body id="login">
  <div class = "container-fluid">
    <form class="form-signin" action="../assets/query" method="post">
      <h2 class="form-signin-heading"> <?php echo _("Please Login")?><br><br></h2>
      <p style="color:red;">Hint :p <br>The username is: Neeham<br>The password is: 1234qwe</p><br><br>
      <input type="text" class="form-control" name="username" placeholder="<?php echo _("Name")?>" required="" autofocus /><br>
      <input type="password" class="form-control" name="password" placeholder="<?php echo _("Password")?>" required=""/><br><br>
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit"><?php echo _("Login")?></button><br>
    </form>

    <button onclick="location.href = 'https://haxstar.com/pages/register';" class="btn btn-lg btn-warning btn-block" name="register"><?php echo _("Register")?></button><br>
  </div>
    <?php include './repeated/footer.php';?>
  </body>
</html>
