<?php session_start();?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" style="padding-right:15px;padding-left:15px;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="https://www.haxstar.com" style="padding:6px"><img src="http://mario.nintendo.com/assets/img/home/char-mario.png" width="35px" /></a> </div> <!-- padding 6 px -->
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="https://www.haxstar.com"><?php echo _("button1")?></a></li>
        <li><a href="https://www.haxstar.com"><?php echo _("button2")?></a></li>
        <li><a href="https://www.haxstar.com"><?php echo _("button3")?></a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><?php echo _("dropdownbutton")?><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="https://www.haxstar.com"><?php echo _("dropdown1")?></a></li>
          <li><a href="https://www.haxstar.com"><?php echo _("dropdown2")?></a></li>
          <li><a href="https://www.haxstar.com"><?php echo _("dropdown3")?></a></li>
        </ul>
      </li>
        <li><a href="https://www.haxstar.com"><?php echo _("button")?></a></li>
       <?php if(isset($_SESSION["session_user"])) { ?>
       <li id="panelcolor"><a href="https://www.haxstar.com"><?php echo _("Your logged in")?></a></li>
       <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
	  if(!isset($_SESSION["session_user"])) { ?>
        <li><a href="https://www.haxstar.com/pages/login"><span class="glyphicon glyphicon-log-in"></span> <?php echo _("Login")?></a></li>
        <?php } else { ?>
        <li><a href="https://www.haxstar.com/assets/logout"><span class="glyphicon glyphicon-log-in"></span> <?php echo _("Log Out")?></a></li>
       <?php } ?>
      </ul>
    </div>
  </div>
</nav>
