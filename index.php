<!DOCTYPE html>
<html lang="en">
   <?php
      require $_SERVER['DOCUMENT_ROOT'] . '/repeated/header.php'; //Getting the code from header.php file.
      if (isset($_SESSION["sessionID"]) && $_SESSION["sessionActivated"] == "1") { //If user is logged in, redirect them to feed page instead of displaying the login page.
          header("Location: https://www.haxstar.com/pages/feed?Login=".$_SESSION["sessionUsername"]);
          exit();
      }
      require $_SERVER['DOCUMENT_ROOT'] . '/assets/alertsModals.php'; //Getting the code from alertModals.php file.
      ?>
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
               <h1 align="center" id="slogan">Don't be wack, start to quack.</h1>
               <img class="floating-duck" src="https://haxstar.com/resources/images/logo/duck.png">
            </div>
            <div class="col-md-3 loginForm">
               <form class="form-signin" action="../assets/query" method="post"> <!-- Login form -->
                  <h2 class="form-signin-heading">Login</h2>
                  <div class="form-group">
                     <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus>
                  </div>
                  <div class="form-group">
                     <input type="password" class="form-control" name="password" placeholder="Password" required="">
                  </div>
                  <div class="form-group form-check">
                     <label class="form-check-label">
                     <input class="form-check-input" type="checkbox" checked="checked" name="remember"> Remember me
                     </label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button><br>
               </form>
               <button onclick="location.href = 'https://haxstar.com/pages/register';" class="btn btn-lg btn-warning btn-block" name="register">Register</button><br>
            </div>
         </div>
         <div class="waveWrapper waveAnimation">
            <div class="waveWrapperInner bgMiddle">
               <div class="wave waveMiddle"></div>
            </div>
         </div>
         <div>
         </div>
         <nav class="navbar navbar-expand-sm bg-warning fixed-bottom"> <!-- The footer code -->
            <div class = "container-fluid">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">Copyright by the Quack Gang © - <?PHP echo date("Y"); ?></li>
               </ul>
               <ul class="navbar-nav">
                  <li class="nav-item"><img src="https://haxstar.com/resources/images/annimation/Quack.gif" height="35px"/></li>
               </ul>
            </div>
         </nav>
      </div>
   </body>
</html>
