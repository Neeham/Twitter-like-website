
<?php
if(isset($_GET['error'])) {
	  echo alert('error','Please verify Username and Password.');
}
?>

      <form class="form-signin" action="./repeated/access" method="post">
        <h2 class="form-signin-heading"><?php echo _("Please Login")?></h2>
        <input type="text" class="form-control" name="username" placeholder="<?php echo _("Name")?>" required="" autofocus />
        <br>
        <input type="password" class="form-control" name="password" placeholder="<?php echo _("Password")?>" required=""/>
        <br> <br>
        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit"><?php echo _("Login")?></button>
        <br>
      </form>
