<!DOCTYPE html>
<html lang="en">
   <?php
      require $_SERVER['DOCUMENT_ROOT'] . '/repeated/navbar.php';
      require $_SERVER['DOCUMENT_ROOT'] . '/assets/query.php';
   ?>
   <body id="feed-bg">
      <div class="container">
         <div class="row">
            <div class="col-md-2"> <!-- Display ads on the feed page, LEFT column -->
<!-- put ad here -->
            </div>
            <div class="col-md-8"> <!-- Display Quacks -->
               <div class="form-group">
                  <form class="form-group" action="../assets/query" method="post">
                     <h2> <label for="tweet">Post a Quack</label> </h2>
                     <textarea class="form-control" id = "quack-box" oninput = "setCounter()" rows="4" name="tweet" maxlength="255" required placeholder="<?php echo _("Quack it") ?>"></textarea>
                     <br>
                     <span class="my-2" id="quack-limit">0/255</span>
                     <button class="btn float-right quack-btn" name="postQuackBtn" id = "quack-button"
                        type="submit"><?php echo _("Quack") ?></button><br>
                     </button>
                  </form>
                  <div class="card my-3">
                     <div class="card-header text-center">Your Feed</div>
                     <ul class="list-group" id="quack-list">
                        <?php printFeed(); ?>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-2"> <!-- Display ads on the feed page, RIGHT column -->
<!-- put ad here -->
            </div>
         </div>
      </div>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/repeated/footer.php'; ?>
      <!--These scripts tag have to run after the html elements have been loaded-->
      <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
      <script src="https://unpkg.com/tippy.js@4"> </script>
      <script type="text/javascript" src="https://haxstar.com/resources/js/feed.js?v=1.4"></script>
   </body>
</html>
