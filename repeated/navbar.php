<?php
require $_SERVER['DOCUMENT_ROOT'] . '/assets/loggedin.php';
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
    </div>

  </div>
  </div>
  </div>
</nav>
