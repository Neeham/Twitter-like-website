<?php
session_start();
if (isset($_SESSION["session_user"]) && $_SESSION['session_activated'] == 1) {
    header("Location: https://www.haxstar.com/pages/feed?Login=".$_SESSION["session_user"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require $_SERVER['DOCUMENT_ROOT'].'/repeated/header.php';
?>


<body id="login">
  <nav class="navbar navbar-expand-sm bg-warning navbar-light">
    <a class="navbar-brand" href="#">
      <img src="https://haxstar.com/images/logo/duck.png" width="30" height="30" class="d-inline-block align-top" alt="">
      <img src="https://haxstar.com/images/logo/Quacker.png" width="140" height="30" class="d-inline-block align-top" alt="">
    </a>
  </nav>
   <div class = "container-fluid">
     <div class = "row">
       <div class="col-md-7">
       <img class="floating-duck" src="https://haxstar.com/images/logo/duck.png" width="250" height="250">
       </div>
       <div class="col-md-3" style="background-color:#e6ecf0">
          <form class="form-signin" action="../assets/query" method="post">
             <h2 class="form-signin-heading"> <?php echo _("Please Login")?><br><br></h2>
             <input type="text" class="form-control" name="username" placeholder="<?php echo _("Username")?>" required="" autofocus /><br>
             <input type="password" class="form-control" name="password" placeholder="<?php echo _("Password")?>" required=""/><br><br>
             <button class="btn btn-lg btn-primary btn-block" name="login" type="submit"><?php echo _("Login")?></button><br>
          </form>
          <button onclick="location.href = 'https://haxstar.com/pages/register';" class="btn btn-lg btn-warning btn-block" name="register"><?php echo _("Register")?></button><br>
       </div>
    </div>
   </div>

<svg version="1.1" id="wave1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="1200px" height="200px" viewBox="0 0 1200 200" enable-background="new 0 0 1200 200" xml:space="preserve">
                <g>
                    <path class="wave" fill="#00779b" d="M0,0" />
                    <path class="wave2" fill="rgba(80,200,235,.6)" d="M0,0" />
                </g>
            </svg>




   <?php require $_SERVER['DOCUMENT_ROOT'].'/repeated/footer.php';?>

   <script type="text/javascript" src="https://haxstar.com/js/index.js?v=1.2"></script>
</body>
</html>
