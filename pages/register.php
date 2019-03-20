<!DOCTYPE html>
<html lang="en">
   <?php require $_SERVER['DOCUMENT_ROOT'].'/repeated/header.php'; ?>
   <body id="register" class="animatedBg">
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/assets/alertsModals.php'; ?>
      <nav class="navbar navbar-expand-sm bg-warning navbar-light">
         <a class="navbar-brand" href="https://www.haxstar.com">
         <img src="https://haxstar.com/resources/images/logo/duck.png" width="30" height="30" class="d-inline-block align-top" alt="">
         <img src="https://haxstar.com/resources/images/logo/Quacker.png" width="140" height="30" class="d-inline-block align-top" alt="">
         </a>
      </nav>
      <div class ="container-fluid">
      <div class="row">
         <div class="col-md-4 center-block"></div>
         <div class="col-md-4 center-block registrationForm">
            <form class="form-signin" action="../assets/query" method="post">
               <h2 class="form-signin-heading display-4">Sign Up</h2>
               <br>
               <div class="form-row">
                  <div class="col-md-4 mb-3">
                     <label>First name</label>
                     <input type="text" maxlength="12" class="form-control" name="firstname" placeholder="First name" required autofocus>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label>Last name</label>
                     <input type="text" maxlength="12" class="form-control" name="lastname" placeholder="Last name" required>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label>Username</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text">@</span>
                        </div>
                        <input type="text" maxlength="12" class="form-control" name="username" placeholder="Username" required>
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label>Password</label>
                     <input type="password" maxlength="64" class="form-control" name="password" placeholder="Password" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Email Address</label>
                     <input type="email" maxlength="64" class="form-control" name="email" placeholder="Email Address" required>
                  </div>
               </div>
               <br>
               <button class="btn btn-lg btn-warning btn-block" name="register" type="submit" disabled>Register - Disabled for Now</button><br>
            </form>
            <button onclick="location.href = 'https://haxstar.com/';" class="btn btn-lg btn-primary btn-block" name="login">Login</button><br>
         </div>
         <div class="col-md-4 center-block"></div>
      </div>
      <?php require $_SERVER['DOCUMENT_ROOT'].'/repeated/footer.php'; ?>
   </body>
</html>
