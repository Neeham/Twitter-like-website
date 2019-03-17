<!DOCTYPE html>
<html lang="en">
<?php
  require $_SERVER['DOCUMENT_ROOT'] . '/repeated/navbar.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/assets/query.php';
?>
   <body id="profile">
      <div class="jumbotron jumbotron-fluid mobile-profile d-lg-none d-block mt-3">
         <div class="container d-flex">
            <div class="mobile-profile-picture">
               <img src="https://www.haxstar.com/resources/images/profilePic/<?php printProfilePage('profilepic'); ?>" class="rounded-circle mobile-profile-picture"/>
            </div>
            <div class="display-4 mb-1 name-mobile">
               <?php printProfilePage('name'); ?>
            </div>
         </div>
         <div class="mobile-info ml-3 mt-3">
            <h4 class="email-mobile">
               Email:
               <h6>
                  <?php printProfilePage('email'); ?>
               </h6>
            </h4>
            <h4 class="followers-mobile">
               Followers:
               <?php printProfilePage('followerCount'); ?>
            </h4>
            <h4 class="following-mobile">
               Following:
               <?php printProfilePage('followingCount'); ?>
            </h4>
         </div>
      </div>
      <div class="container d-none d-lg-block" id="profile_container">
         <div class="row " id="profile_row">
            <div class="col-lg-3 d-none d-lg-block" id="your-profile">
               <!--Your Profile-->
               <div class="card">
                  <div class="text-center card-header">
                     <h3>Your Profile</h3>
                  </div>
                  <div class="text-center  card-text">
                     <ul class="list-group ">
                        <li class="list-group-item profile-bg">
                           <h5>
                              <!--PROFILE PICTURE-->
                              <img src="https://www.haxstar.com/resources/images/profilePic/<?php printProfilePage('profilepic'); ?>" class="rounded-circle"/>
                              <br /> <br />
                              <?php printProfilePage('name'); ?>
                           </h5>
                                 <div class="panel-body" align="center">
                                   <?php printProfilePage('button'); printProfilePage('upload');?>
                                 </div>
                           <br />
                           <h3>Email:</h3>
                           <br />
                           <p><?php printProfilePage('email'); ?></p>
                           <h5>Followers:</h5>
                           <br />
                           <p><?php printProfilePage('followerCount'); ?></p>
                           <h5>Following:</h5>
                           <br />
                           <p><?php printProfilePage('followingCount'); ?></p>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-6 ">
               <h3><?php echo ("Your Latest Quacks") ?></h3>
               <div class="card my-3">
                  <div class="card-header text-center">Your Feed</div>
                  <ul class="list-group" id="quack-list">
                  <?php printProfilePage('post'); ?>
               </div>
            </div>
            <div class="col-md-3 d-none d-lg-block">
               <!--Following & Followers-->
               <div class="card" id="following">
                  <!--FOLLOWING-->
                  <div class="card-header text-center">Following</div>
                  <div class="card-text">
                     <ul class="list-group ">
                        <?php printProfilePage('following'); ?>
                     </ul>
                  </div>
                  <div class="card my-1" id="followers">
                     <div class="card-header text-center">Followers</div>
                     <div class="card-text">
                        <ul class="list-group ">
                           <?php printProfilePage('followers'); ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--End row-->
      <div class="container d-lg-none d-block">
         <div class="card">
            <div class="card-header">
               <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                  <li class="nav-item mobile-nav-item">
                     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Quacks</a>
                  </li>
                  <li class="nav-item mobile-nav-item">
                     <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Following</a>
                  </li>
                  <li class="nav-item mobile-nav-item">
                     <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Followers</a>
                  </li>
               </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
               <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <?php printProfilePage('post'); ?>
               </div>
               <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                  <?php printProfilePage('following'); ?>
               </div>
               <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                  <?php printProfilePage('followers'); ?>
               </div>
            </div>
         </div>
      </div> <!--Container-->
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/repeated/footer.php'; ?>
      <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
      <script src="https://unpkg.com/tippy.js@4"></script>
      <script src="https://www.haxstar.com/resources/js/profile.js?v=1.4"></script>
   </body>
</html>

<div id="uploadimageModal" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Crop & Upload Profile Picture</h4>
            <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload()">&times;</button>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-8 text-center">
              <div id="image_demo" style="width:350px; margin-top:30px"></div>
            </div>
        </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success crop_image">Upload</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" onClick="window.location.reload()">Close</button>
          </div>
      </div>
    </div>
</div>

<script>
$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'circle'
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"/assets/query",
        type: "POST",
        data:{"cropAndUpload": response},
        success:function(data) {
          $('#uploadimageModal').modal('hide');
          location.reload();
        }
      });
    })
  });
});
</script>
