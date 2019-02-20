<?php
function alert($type, $title ,$msg){
if ($type == "error") { ?>

<style>
.modal-header {
background-color: #FF0000;
}
</style>
<?php }

else if ($type == "success") {?>
<style>
.modal-header {
background-color: #00CF37;
}
</style>
<?php }

else if ($type == "warning") {?>
<style>
.modal-header {
background-color: #ffa500;
}
</style>
<?php }

?>

<div class="modal fade" tabindex="-1" id="myModal" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <?php if ($type == "error") { ?>
            <h4 class="modal-title"><?php echo $title ?></h4>
            <?php } else if ($type == "success") {?>
            <h4 class="modal-title"><?php echo $title?></h4>
            <?php } else if ($type == "warning") {?>
            <h4 class="modal-title"><?php echo $title?></h4>
            <?php } ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="location.href=window.location.pathname">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p><?php echo $msg ?></p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="location.href=window.location.pathname"><?php echo _("Close")?></button>
         </div>
      </div>
   </div>
</div>

  <script type=text/javascript>
$('#myModal').modal('show');
</script>
<?php
}


//ndex page
if (basename($_SERVER['PHP_SELF'], '.php') == "index") {

    if ($_GET['Alert'] == 'credentialError') {
        echo alert('error', 'Credentials', 'Please verify Username and Password.');
    }
    if ($_GET['Alert'] == 'verifyEmail') {
        echo alert('warning', 'Email Verification', 'Please verify your email in order to activate your account. Contact the support team if you are having any difficulties :)');
    }
    if ($_GET['Alert'] == 'activationError') {
        echo alert('error', 'Error', 'Invalid URL or email has already been verified.');
    }
    if ($_GET['Alert'] == 'emailVerified') {
        echo alert('success', 'Verified!', 'Thank you for verifying your email! You may login!');
    }
}

//feed page
if (basename($_SERVER['PHP_SELF'], '.php') == "feed") {

}
//profile page
if (basename($_SERVER['PHP_SELF'], '.php') == "profile") {

    if ($_GET['Alert'] == 'errorInsert') {
        echo alert('Alert', 'Database Error', 'Something went wrong (not entered in database). Please try again.');
    }
    if ($_GET['Alert'] == 'successfulInsert') {
        echo alert('success', 'Woohoo', 'Your Quack has successfully been posted! Happy Quacking!');
   }
}

//register pages
if (basename($_SERVER['PHP_SELF'], '.php') == "register") {

    if ($_GET['Alert'] == 'errorNameExists') {
        echo alert('error', 'Username Already Exists', 'The username already exists. Please choose another username.');
    }
    if ($_GET['Alert'] == 'errorEmailExists') {
        echo alert('error', 'Email Address Already Exists', 'The email address already exists. Please login or contact the support team in order to reset your password.');
    }
}
?>
