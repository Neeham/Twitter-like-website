<!-- testing 123 -->

<!DOCTYPE html>
<html lang="en">
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/repeated/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/repeated/navbar.php';
?>



<!-- <body id="feed">  //trying to fix conflicts, if this is needed can uncomment -->



<body id="feed-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
          <textarea class="form-control my-2 emoji-field" id="quack-box" rows="3" maxlength="255"
            placeholder="Write your thoughts..." oninput="setCounter()"></textarea>
          <span class="my-2" id="quack-limit">0/255</span>
          <button class="btn float-right mx-1" id="quack-button">Quack!</button>
          <button class="btn btn-light float-right mx-1" id="emoji-button">😂<i class="fas fa-caret-up"></i></button>
          <button class="btn btn-light float-right mx-1 " id="image-upload-button"> <i
              class="fas fa-image"></i></button>

        </div>
        <div class="card my-3">
          <div class="card-header text-center">Your Feed</div>
          <ul class="list-group" id="quack-list">

            <li class="list-group-item quack">
              <div class="media">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="" />
                <div class="media-body mx-2">
                  <h5><a href="#">@JStrong</a></h5>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Quasi enim minima odio, inventore sint sunt nulla adipisci
                  iure sit dolor. <br />
                  <button class="btn btn-primary float-right reply mx-1">
                    Reply <i class=" fas fa-reply"></i>
                  </button>
                  <button class="btn float-right btn-danger like mx-1">
                    <i class="fas fa-heart"></i>
                  </button>
                </div>
              </div>
            </li>
          </ul>
        </div>

      </div>


      <div class="col-md-4" id="follower-suggestions">
        <div class="card my-1">
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

        <div class="card my-1">
          <div class="card-header">Follower(s)</div>

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


    </div>



      <?php require  $_SERVER['DOCUMENT_ROOT'].'/repeated/footer.php';?>
      <!--This script tag has to be at the end of the body tag because the feed.js file
      has to run after the html elements are loaded-->
      <script type="text/javascript" src="../js/feed.js"></script>
</body>

</html>
