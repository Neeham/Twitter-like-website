<!DOCTYPE html>
<html lang="en">
<?php
include '../repeated/header.php';
include '../repeated/navbar.php';
include '../assets/alert.php';
include '../assets/query.php';
if (isset($_GET['errorInsert'])) {
echo alert('error', 'Something went wrong (not entered in database). Please try again.');
}
if (isset($_GET['successfulInsert'])) {
echo alert('success', 'Your Quack has successfully been posted! Happy Quacking!');
}
?>
  <body id="profile">
    <div class="container">
      <h1 style="color:red;">Welcome to the PROFILE page!</h1>
      <h1>Learn how to code in html/css and how to use bootstrap!!!</h1>
      <p>What's up frontend! Here are some links that will help you guys get started ^_^ </p>
      <p>Learning html/css: https://www.w3schools.com/html/html5_intro.asp</p>
      <p>Link to learning bootstrap: https://www.w3schools.com/bootstrap4/bootstrap_grid_basic.asp</p>

      <body id="postQuack">
        <form class="form-postQuack" action="../assets/query" method="post">
        <h2 class="form-postQuack-heading">
          <?php echo _("*Post a Quack")?>
        </h2><br>
        <input type="text" class="form-control" name="tweet" maxlength="255" placeholder="<?php echo _("*Write your Quack here")?>" required="" autofocus />
        <?php echo _("*255 Maximum Character Length")?><br><br>
        <button class="btn btn-lg btn-primary btn-block" name="postQuackBtn" type="submit"><?php echo _("*Quack")?></button><br>
        </button><br>
      </form>
    </body>

    <h3 class="form-viewQuacks-heading">
      <?php echo _("*Your Latest Quacks")?>
    </h3>
      <?php //create method call to display user's Quacks ?>
    </div>
    <?php include '../repeated/footer.php';?>
  </body>
</html>
