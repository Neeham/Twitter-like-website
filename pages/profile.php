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
         <div class="col-md-6 center-block" style="background-color:lavenderblush;">
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
      </div>
   </div>
   <?php require $_SERVER['DOCUMENT_ROOT'].'/repeated/footer.php';?>
</body>
</html>
