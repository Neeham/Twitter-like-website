<!DOCTYPE html>
<html lang="en">
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/repeated/navbar.php';
require $_SERVER['DOCUMENT_ROOT'] . '/assets/query.php';
printQuacks('checkURL');//Check here if URL even make sense in order to redirect before running any html code
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
                <h1>
                    <img src="../images/users/default_duck.jpg" class="rounded-circle" id="default_duck" /><?php printQuacks('name');?></a>
                </h1></br>
                <!-- Need a button here, upon click it will run follow query the button will then change to following - Need to hide the button here when the person visit their own profile -->
                <button class="btn btn-outline-success btn-sm follow mx-1 profile-follow d-none">
                <i class="fas fa-check"></i>Follow</button>
                </br></br>
                <h3>Email:</h3></br>
                <p><?php printQuacks('email');?></p>
                <h5>Followers:</h5></br>
                <p><?php printQuacks('followerCount');?></p>
                <h5>Following:</h5></br>
                <p><?php printQuacks('followingCount');?></p>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6 center-block text-center" style="background-color:yellow; border-radius: 6px; padding: 0px; margin: 0px;">
        <h3> <?php echo _("Your Latest Quacks") ?> </h3>
        <?php printQuacks('post');?>
      </div>


      <div class="col-md-3 "> <!--Following & Followers-->

        <div class="card my-1" id="following">   <!--FOLLOWING-->
          <div class="card-header text-center">Following</div>

          <div class="card-text">
            <ul class="list-group ">
              <li class="list-group-item follow-suggestion">

                <h6><a href="#">
                    <img src="https://randomuser.me/api/portraits/women/74.jpg" /> Bobby Lynch</a>
                  <button class="btn btn-outline-success btn-sm float-right follow mx-1">
                    <i class="fas fa-check"></i> Follow</button>
                </h6>

              </li>
              <li class="list-group-item follow-suggestion">

                <h6><a href="#">
                    <img src="https://randomuser.me/api/portraits/men/99.jpg" /> Veronica Bugs</a>
                  <button class="btn btn-outline-success btn-sm float-right follow mx-1">
                    <i class="fas fa-check"></i> Follow</button>
                </h6>

              </li>
              <li class="list-group-item follow-suggestion">

                <h6><a href="#">
                    <img src="https://randomuser.me/api/portraits/men/81.jpg" />Baby Big Jr.</a>
                    <button class="btn btn-outline-success btn-sm float-right follow mx-1">
                      <i class="fas fa-check"></i> Follow</button>
                    </h6>
                  </li>
                </ul>
              </div>
            </div>

          </br>


        <div class="card my-1" id="followers">
          <div class="card-header text-center">Followers</div>

          <div class="card-text">
            <ul class="list-group ">
              <li class="list-group-item follow-suggestion">

                <h6><a href="#">
                    <img src="https://randomuser.me/api/portraits/women/77.jpg" /> Ann Marie</a>
                  <button class="btn btn-outline-success btn-sm float-right follow mx-1">
                    <i class="fas fa-check"></i> Follow</button>
                </h6>

              </li>
              <li class="list-group-item follow-suggestion">

                <h6><a href="#">
                    <img src="https://randomuser.me/api/portraits/men/94.jpg" /> Marc Anthony</a>
                  <button class="btn btn-outline-success btn-sm float-right follow mx-1">
                    <i class="fas fa-check"></i> Follow</button>
                </h6>

              </li>
              <li class="list-group-item follow-suggestion">

                <h6><a href="#">
                    <img src="https://randomuser.me/api/portraits/men/89.jpg" /> John Shepherd</a>
                  <button class="btn btn-outline-success btn-sm float-right follow mx-1">
                    <i class="fas fa-check"></i> Follow</button>
                </h6>

              </li>
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
