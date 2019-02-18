<!DOCTYPE html>
<html lang="en">
<?php
  require $_SERVER['DOCUMENT_ROOT'].'/repeated/header.php';
  require $_SERVER['DOCUMENT_ROOT'].'/repeated/navbar.php';
  require $_SERVER['DOCUMENT_ROOT'].'/assets/query.php';
?>
<body id="profile">
   <div class="container">
      <div class="row">
         <div class="col-md-3 center-block user-info"><br><br>Quack gang! These are some helpful link for you to get started:<br><br><a href="https://www.w3schools.com/html/html5_intro.asp">Learn how to html/css.</a><br><br>P.S. Good job work everyone! <3</div>
         <div class="col-md-6 center-block user-quacks" style="background-color:lavenderblush;">
            <form class="form-group" action="../assets/query" method="post">
               <h2> <label for="tweet">*Post a Quack</label> </h2>
               <textarea class="form-control" rows="4" name="tweet" maxlength="255" required placeholder="<?php echo _("*Write your Quack here")?>"></textarea>
               <br>
               <button class="btn btn-lg btn-primary btn-block" name="postQuackBtn" type="submit"><?php echo _("*Quack")?></button><br>
               </button>
            </form>
            <h3> <?php echo _("*Your Latest Quacks")?> </h3>
            <?php printQuacks(); ?>
         </div>
         <div class="col-md-3 center-block follower-info"><br><br>Quack Gang! These are some helpful link for you to get started:<br><br><a href="https://www.w3schools.com/bootstrap4/bootstrap_grid_basic.asp">Learn how bootstrap works.</a><br><br>P.S. Good job work everyone! <3</div>
      </div>
   </div>
   <?php require $_SERVER['DOCUMENT_ROOT'].'/repeated/footer.php';?>
</body>
</html>
