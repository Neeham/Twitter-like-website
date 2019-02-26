<!DOCTYPE html>
<html lang="en">
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/repeated/navbar.php';
require $_SERVER['DOCUMENT_ROOT'] . '/assets/query.php';
?>



<!-- <body id="feed">  //trying to fix conflicts, if this is needed can uncomment -->



<body id="feed-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
          <form class="form-group" action="../assets/query" method="post">
            <h2> <label for="tweet">Post a Quack</label> </h2>
            <textarea class="form-control" id = "quack-box" oninput = "setCounter()" rows="4" name="tweet" maxlength="255" required
              placeholder="<?php echo _("Quack it") ?>"></textarea>
            <br>
            <span class="my-2" id="quack-limit">0/255</span>
            <button class="btn float-right quack-btn" name="postQuackBtn" id = "quack-button"
              type="submit"><?php echo _("Quack") ?></button><br>
            </button>
          </form>
          <div class="card my-3">
            <div class="card-header text-center">Your Feed</div>
            <ul class="list-group" id="quack-list">
              <?php printFeed();?>
            </ul>
          </div>

        </div>
      </div>

      <div class="col-md-4" id="follower-suggestions">
        <div class="card my-1">
          <div class="card-header">You May Like</div>

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

      <?php require $_SERVER['DOCUMENT_ROOT'] . '/repeated/footer.php';?>
      <!--These scripts tag have to run after the html elements have been loaded-->
      <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
      <script src="https://unpkg.com/tippy.js@4"> </script>
      <script type="text/javascript" src="https://haxstar.com/js/feed.js?v=1.3"></script>


</body>

</html>
