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
      <div class="col-lg-3" id="your-profile">
        <div class="card">
          <div class="card-header">
            <h2>Your Profile</h2>
          </div>
          <div class="card-text">
            <ul class="list-group ">

              <li class="list-group-item follow-suggestion">
                <h1>
                    <img src="https://randomuser.me/api/portraits/women/50.jpg" id="#" /><?php printQuacks('name');?></a>
                </h1></br>
                <h3>Email:</h3></br>
                <p><?php printQuacks('email');?></p>
                <h3>Followers:</h3></br>
                <p><?php printQuacks('followerCount');?></p> <!-- Work in progress -->
                <h3>Following:</h3></br>
                <p><?php printQuacks('followingCount');?></p> <!-- Work in progress -->
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6 center-block" style="background-color:lavenderblush;">
        <form class="form-group" action="../assets/query" method="post">
          <h2> <label for="tweet">Post a Quack</label> </h2>
          <textarea class="form-control" id = "quack-box" oninput = "setCounter()" rows="4" name="tweet" maxlength="255" required
            placeholder="<?php echo _("Quack it") ?>"></textarea>
          <br>
          <span class="my-2" id="quack-limit">0/255</span>
          <button class="btn btn-lg btn-primary btn-block" name="postQuackBtn"
            type="submit"><?php echo _("*Quack") ?></button><br>
          </button>
        </form>
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
  <script src="https://www.haxstar.com/js/profile.js"></script> <!--This should be part of repeated/header code. -->
</body>

</html>
