<?php
require $_SERVER['DOCUMENT_ROOT'] . '/assets/loggedin.php';
require $_SERVER['DOCUMENT_ROOT'] . '/repeated/header.php';
session_start();
?>
<nav class="navbar navbar-expand-sm bg-warning navbar-light">
  <div class="container">
    <a class="navbar-brand" href="https://www.haxstar.com/pages/feed?Login=<?php echo $_SESSION["session_user"]?>"><img
        src="https://haxstar.com/images/logo/duck.png" height="35px" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class = "collapse navbar-collapse" id = "navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="https://www.haxstar.com/pages/profile?Login=<?php echo $_SESSION["session_user"]?>">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.haxstar.com/pages/feed?Login=<?php echo $_SESSION["session_user"]?>">Feed</a>
      </li>
    </ul>
    <ul class = "navbar-nav ml-auto">
      <li class="nav-item ">
          <a class="nav-link" href="https://www.haxstar.com/assets/logout">Log out</a>
        </li>
      </ul>
      <button type="button" class="btn btn-info my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">Search a User</button>
    </div>
  </div>
</nav>

<!-- Pop up for Searching a User -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Username Lookup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="userfields" id="userfields" class="form-control" placeholder="Search User" />
        <div id="userList"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Search the database for users -->
<script>
$(document).ready(function(){
     $('#userfields').keyup(function(){
          var query = $(this).val();
          if(query != '') {
               $.ajax({
                    url:"../assets/query",
                    method:"POST",
                    data:{searchUser:query},
                    success:function(data) {
                         $('#userList').fadeIn();
                         $('#userList').html(data);
                    }
               });
          }
     });
     $(document).on('click', '#userList li', function(){
          $('#userfields').val($(this).text());
          var user = document.getElementById("userfields").value;
          window.location.href = '<?PHP echo 'https://www.haxstar.com/pages/profile?Login='.$_SESSION["session_user"].'&Lookup='?>'+user;
          $('#userList').fadeOut();
     });
});
</script>
