<!DOCTYPE html>
<html lang="en">
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/repeated/navbar.php';
require $_SERVER['DOCUMENT_ROOT'] . '/assets/query.php';
printProfilePage('checkURL');//Check here if URL even make sense in order to redirect before running any html code
?>
<body id="profile">
  <div class="container" id="profile_container">
    <div class="row" id="profile_row">

      <div class="col-lg-3" id="your-profile">   <!--Your Profile-->
        <div class="card">
          <div class="text-center card-header">
            <h3>Your Profile</h3>
          </div>
          <div class="text-center  card-text">
            <ul class="list-group ">

              <li class="list-group-item follow-suggestion">
                <h5> <!--PROFILE PICTURE-->
                    <img src="../images/users/default_duck.jpg" class="rounded-circle" style="width: 100%; height:100%;" id="default_duck" /><?php printProfilePage('name');?></a>
                </h5>
              </br>
                <?PHP printProfilePage('button');?>
                <!-- <button class="btn btn-outline-success btn-sm follow mx-1 profile-follow d-none">
                <i class="fas fa-check"></i>Follow</button> -->
                </br></br>
                <h3>Email:</h3></br>
                <p><?php printProfilePage('email');?></p>
                <h5>Followers:</h5></br>
                <p><?php printProfilePage('followerCount');?></p>
                <h5>Following:</h5></br>
                <p><?php printProfilePage('followingCount');?></p>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6 center-block" style="border-radius: 6px; padding: 0px; margin: 0px;">
        <h3> <?php echo _("Your Latest Quacks") ?> </h3>
        <?php printProfilePage('post');?>
      </div>


      <div class="col-md-3 "> <!--Following & Followers-->

        <div class="card" id="following">   <!--FOLLOWING-->
          <div class="card-header text-center">Following</div>

          <div class="card-text">
            <ul class="list-group ">
              <?php printProfilePage('following');?>
                </ul>
              </div>
            </div>

          </br>


        <div class="card my-1" id="followers">
          <div class="card-header text-center">Followers</div>

          <div class="card-text">
            <ul class="list-group ">
              <?php printProfilePage('followers');?>
            </ul>
          </div>
        </div>


      </div>

    </div>
    <!--End row-->
  </div>
  <!--Container-->

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/repeated/footer.php';?>
  <script src="https://www.haxstar.com/js/profile.js?v=1.1"></script>
 </body>

</html>
