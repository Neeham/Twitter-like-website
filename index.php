<?php
session_start();
if (isset($_SESSION["sessionUsername"]) && $_SESSION['session_activated'] == 1) {
    header("Location: https://www.haxstar.com/pages/feed?Login=".$_SESSION["sessionUsername"]);
    exit();
}
?> <!-- TESTING TRAVIS -->
<!DOCTYPE html>
<html lang="en">
   <?php require $_SERVER['DOCUMENT_ROOT'].'/repeated/header.php'; ?>
   <body id="login">
      <nav class="navbar navbar-expand-sm bg-warning navbar-light">
         <a class="navbar-brand">
         <img src="https://haxstar.com/resources/images/logo/duck.png" width="30" height="30" class="d-inline-block align-top" alt="">
         <img src="https://haxstar.com/resources/images/logo/Quacker.png" width="140" height="30" class="d-inline-block align-top" alt="">
         </a>
      </nav>
      <div class = "container-fluid">
      <div class = "row">
         <div class="col-md-7">
           <h1 align="center">Don't be wack, start to quack.</h1>
            <img class="floating-duck" src="https://haxstar.com/resources/images/logo/duck.png">
         </div>
         <div class="col-md-3 loginForm">
            <form class="form-signin" action="../assets/query" method="post">
               <h2 class="form-signin-heading">Login</h2>
               <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus /><br>
               <input type="password" class="form-control" name="password" placeholder="Password" required=""/><br><br>
               <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button><br>
            </form>
            <button onclick="location.href = 'https://haxstar.com/pages/register';" class="btn btn-lg btn-warning btn-block" name="register">Register</button><br>
         </div>
      </div>
      <div class="waveWrapper waveAnimation">
         <div class="waveWrapperInner bgMiddle">
            <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
         </div>
      </div>
      <div>
      </div>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/repeated/footer.php'; ?>
   </body>
</html>
