<!DOCTYPE html>
<html lang="en">
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/repeated/navbar.php';
require $_SERVER['DOCUMENT_ROOT'] . '/assets/query.php';
?>

<body id="profile">
  <div class="container">
    <div class="row">

      <!--Your Profile-->
      <div class=" col-lg-3" id="your-profile">
        <div class="card">
          <div class="text-center card-header">
            <h2>Your Profile</h2>
          </div>
          <div class="text-center  card-text">
            <ul class="list-group ">

              <li class="list-group-item follow-suggestion"> <!-- where is the closing for this tag? -->
                <h1>
                    <img src="https://randomuser.me/api/portraits/women/50.jpg" id="#" /><?php printQuacks('name');?></a>
                </h1></br>
                <!-- Need a button here, upon click it will run follow query the button will then change to following - Need to hide the button here when the person visit their own profile -->
                <button class="btn btn-outline-success btn-sm follow mx-1 profile-follow d-hidden">
                <i class="fas fa-check"></i> Follow</button>
                </br></br>
                <h3>Email:</h3></br>
                <p><?php printQuacks('email');?></p>
                <h3>Followers:</h3></br>
                <p><?php printQuacks('followerCount');?></p>
                <h3>Following:</h3></br>
                <p><?php printQuacks('followingCount');?></p>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6 center-block" style="background-color:lavenderblush;">

        <h3> <?php echo _("*Your Latest Quacks") ?> </h3>
        <?php printQuacks('post');?>
      </div>

      <!--Following & Followers-->
      <div class="col-md-3 ">

        <!--FOLLOWING-->
        <div class="card my-1" id="following">
          <div class="card-header">Following</div>

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


        <div class="card my-1" id="followers">
          <div class="card-header">Followers</div>

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
      <!--end of Marc changes-->

    </div>
    <!--End row-->
  </div>
  <!--Container-->

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/repeated/footer.php';?>
  <script src="https://www.haxstar.com/js/profile.js?v=1.1"></script>
 </body>

</html>
