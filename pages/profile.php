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


    <!--MARC changes-->
    <div class="col-md-4" >
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


            <div class="card my-1" id="following">
              <div class="card-header">Following</div>

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
                </div> <!--end of Marc changes-->

        </div> <!--End row-->
      </div> <!--Container-->

      <?php require $_SERVER['DOCUMENT_ROOT'].'/repeated/footer.php';?>
    </body>
    </html>
