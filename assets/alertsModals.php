<?php
   function alert($type, $title, $msg) {

   $currentURL = 'https://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; //The current URL of the page
   $modifyURL = modify_url($currentURL, 'Alert'); //Modify the URL to remove the Alert parameter (This URL will be called when Alert is closed)

   if ($type == "error") { ?>
<style>
   .modal-header {
   background-color: #FF0000;
   }
</style>
<?php }
   else if ($type == "success") { ?>
<style>
   .modal-header {
   background-color: #00CF37;
   }
</style>
<?php }
   else if ($type == "warning") { ?>
<style>
   .modal-header {
   background-color: #ffa500;
   }
</style>
<?php
   }
   ?>
<div class="modal fade" tabindex="-1" id="message" role="dialog" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <?php if ($type == "error") { ?>
            <h4 class="modal-title"><?php echo $title ?></h4>
            <?php } else if ($type == "success") { ?>
            <h4 class="modal-title"><?php echo $title ?></h4>
            <?php } else if ($type == "warning") { ?>
            <h4 class="modal-title"><?php echo $title ?></h4>
            <?php } ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="location.href='<?php echo $modifyURL; ?>'">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p><?php echo $msg ?></p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal" onClick="location.href='<?php echo $modifyURL; ?>'" id="modalCloseButton">Close</button>
         </div>
      </div>
   </div>
</div>
<script type=text/javascript>
   $('#message').modal('show');
</script>
<?php
} //Ending of alert function

   //index page
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

     if ($_GET['Alert'] == 'errorInsert') {
       echo alert('error', 'Database Error', 'Something went wrong (not entered in database). Please try again. :(');
     }
     if ($_GET['Alert'] == 'successfulInsert') {
       echo alert('success', 'Woohoo', 'Your Quack has successfully been posted! Happy Quacking! :D');
     }
     if ($_GET['Alert'] == 'errorLike') {
      echo alert('error', 'Database Error', 'Something went wrong (The Quack is not liked). Please try again. :(');
     }
   }

   //profile page
   if (basename($_SERVER['PHP_SELF'], '.php') == "profile") {

     if ($_GET['Alert'] == 'invalidURL') {
       echo alert('error', 'Invalid URL', 'The URL is invalid. You have been redirected to your profile.');
     }
     if ($_GET['Alert'] == 'errorLike') {
       echo alert('error', 'Database Error', 'Something went wrong (The Quack is not liked). Please try again. :()');
     }
   }

   //register pages
   if (basename($_SERVER['PHP_SELF'], '.php') == "register") {

       if ($_GET['Alert'] == 'disabled') {
         echo alert('error', 'Nice Try!', 'You may have bypassed through the Insepect Element. Not this time!');
       }
       if ($_GET['Alert'] == 'errorNameExists') {
           echo alert('error', 'Username Already Exists', 'The username already exists. Please choose another username.');
       }
       if ($_GET['Alert'] == 'errorEmailExists') {
           echo alert('error', 'Email Address Already Exists', 'The email address already exists. Please login or contact the support team in order to reset your password.');
       }
   }

   //Modifying URL for when the Alert is closed to remove the alert paramter from it.
   function modify_url( $url, $param ) {
       $baseUrl = strtok($url, '?');              // Get the base url
       $parsedUrl = parse_url($url);              // Parse it
       $query = $parsedUrl['query'];              // Get the query string
       parse_str( $query, $parameters );           // Convert Parameters into array
       unset( $parameters[$param] );               // Delete the one you want
       $newQuery = http_build_query($parameters); // Rebuilt query string
       return $baseUrl.'?'.$newQuery;            // Final modified URL
   }
   ?>
<!-- Open the modal for Searching a User -->
<div class="modal fade" id="searchUserModal" role="dialog" data-backdrop="static" data-keyboard="false">
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
            <button type="button" class="btn" data-dismiss="modal" id="modalCloseButton">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Open the modal for when "Choose file" button is clicked under profile for uploading a profile picture -->
<div id="uploadimageModal" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title-center">Crop & Upload Profile Picture</h4>
            <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload()">&times;</button>
         </div>
         <div class="modal-body">
            <div id="imageToCrop"></div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-success crop_image">Upload</button>
            <button type="button" class="btn" data-dismiss="modal" onClick="window.location.reload()" id="modalCloseButton">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Open the modal for when "View All" button is clicked under profile for following -->
<div class="modal fade" id="myFollowingModal" role="dialog" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Following List</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body" id="displayFollowingList">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal" id="modalCloseButton">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Open the modal for when "View All" button is clicked under profile for followers -->
<div class="modal fade" id="myFollowerModal" role="dialog" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-sm modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Follower List</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body" id="displayFollowerList">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal" id="modalCloseButton">Close</button>
         </div>
      </div>
   </div>
</div>
