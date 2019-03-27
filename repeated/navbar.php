<?php
   require $_SERVER['DOCUMENT_ROOT'] . '/assets/loggedIn.php'; //Getting the code from loggedIn.php file.
   require $_SERVER['DOCUMENT_ROOT'] . '/repeated/header.php'; //Getting the code from header.php file.
   require $_SERVER['DOCUMENT_ROOT'] . '/assets/alertsModals.php'; //Getting the code from alertModals.php file.
   ?>
<div class="wrapper"> <!-- The end tag of this wrapper class is found at the very end of footer.php file-->
<div class="header">
   <nav class="navbar navbar-expand-sm bg-warning navbar-light navbar-fixed-top"> <!-- Nav Bar -->
         <a class="navbar-brand" href="https://www.haxstar.com/pages/feed?Login=<?php echo $_SESSION["sessionUsername"]; ?>"><img
            src="https://haxstar.com/resources/images/logo/duck.png" height="35px" /></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class = "collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="https://www.haxstar.com/pages/profile?Login=<?php echo $_SESSION["sessionUsername"]; ?>">My Profile</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="https://www.haxstar.com/pages/feed?Login=<?php echo $_SESSION["sessionUsername"]; ?>">Feed</a>
               </li>
            </ul>
            <ul class = "navbar-nav ml-auto">
              <div class="lastLoggedIn"> Logged in: <?php echo $_SESSION["sessionLastLoggedIn"]."&nbsp&nbsp"; ?> </div> <!-- Displaying the last time the user logged in -->
               <li class = "nav-item">
                  <button type="button" class="btn my-2 my-sm-0 orangeColorButton" data-toggle="modal" data-target="#searchUserModal">Search a User</button>
               </li>
               <li class="nav-item ">
                  <a class="nav-link p-0" href="https://www.haxstar.com/assets/logout"><button class="Logout-button btn btn-danger mx-2 my-2 my-sm-0">Log out</button></a>
               </li>
            </ul>
         </div>
   </nav>
</div>
<div class="container-fluid text-center" id="adBlock"> <!-- text to unhide (display) when adblock is detected -->
   <div class="spinner-grow text-danger"></div><strong style="color:red">AdBlocker Detected</strong><div class="spinner-grow text-danger"></div><br> It appears that you are using an <strong>AdBlocker</strong>. Please consider adding an exception to your <strong>AdBlocker</strong> for https://www.haxstar.com <br> Quacker is largely supported by the advertising income. This is why our ducks are able to swim and reunite with their family! Thank you for your support :)
</div>
<!-- Search the database for a user profile to visit -->
<script>
   $(document).ready(function() {
        $('#userfields').keyup(function() {
             var query = $(this).val();
             if(query != '') {
                  $.ajax({
                       url:"/assets/query",
                       method:"POST",
                       data:{searchUser:query},
                       success:function(data) {
                            $('#userList').fadeIn();
                            $('#userList').html(data);
                       }
                  });
             }
        });
        $(document).on('click', '#userList li', function() {
             $('#userfields').val($(this).text());
             var user = document.getElementById("userfields").value;
             window.location.href = '<?php echo 'https://www.haxstar.com/pages/profile?Login='.$_SESSION["sessionUsername"].'&Lookup=' ?>'+user;
             $('#userList').fadeOut();
        });
   });
</script>
