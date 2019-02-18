<?php
  require $_SERVER['DOCUMENT_ROOT'].'/assets/loggedin.php';
  session_start();
?>
<nav class="navbar navbar-expand-sm bg-warning navbar-light">
  <a class="navbar-brand" href="https://www.haxstar.com/pages/feed"><img src="https://haxstar.com/images/logo/duck.png" height="35px"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="https://www.haxstar.com/pages/profile">My Profile</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Drop Down Menu</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Option 1</a>
          <a class="dropdown-item" href="#">Option 2</a>
          <a class="dropdown-item" href="#">Option 3</a>
        </div>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.haxstar.com/assets/logout">Log out</a>
      </li>

    </ul>
  </div>
</nav>
