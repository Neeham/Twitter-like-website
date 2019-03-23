<!DOCTYPE html>
<html lang="en">
<?php
   require $_SERVER['DOCUMENT_ROOT'] . '/repeated/navbar.php'; //Getting the code from navbar.php file.
   require $_SERVER['DOCUMENT_ROOT'] . '/assets/query.php'; //Getting the code from query.php file.
?>
   <body id="feed-bg">
      <div class="container  ">
         <div class="row">
            <div  id="ad1" class="col-md-2 position-sticky d-none d-lg-block">
               <!-- Display ads on the feed page, LEFT column -->
               <div class="card">
                  <div class="card-header text-center">
                     Movie ad
                  </div>
                  <div class="card-text">
                     <img class="img-fluid" src="https://www.haxstar.com/resources/images/ads/howard-the-duck.jpg" />
                  </div>
               </div>
               <div class="card">
                  <div class="card-header text-center">
                     Restaurant ad
                  </div>
                  <div class="card-text">
                     <img class="img-fluid" src="https://www.haxstar.com/resources/images/ads/fancyduck.jpg" />
                  </div>
               </div>
               <div class="card">
                  <div class="card-header text-center">
                     Movie ad
                  </div>
                  <div class="card-text">
                     <img class="img-fluid" src="https://www.haxstar.com/resources/images/ads/lucky-duck.jpg" />
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <!-- Display Quacks -->
               <div class="form-group">
                  <form class="form-group" action="../assets/query" method="post">
                     <h2 class="display-4 text-danger">Post a Quack:</h2>
                     <textarea class="form-control" id = "quack-box" oninput = "setCounter()" rows="4" name="tweet" maxlength="255" required placeholder="Quack it"></textarea>
                     <br>
                     <span class="my-2" id="quack-limit">0/255</span>
                     <button class="btn float-right quack-btn" name="postQuackBtn" id = "quack-button"
                        type="submit">Quack</button><br>
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
            <div  id="ad2" class="col-md-2 d-none d-lg-block">
               <!-- Display ads on the feed page, Right column -->
               <div class="card">
                  <div class="card-header text-center">
                     Movie ad
                  </div>
                  <div class="card-text">
                     <img class="img-fluid" src="https://www.haxstar.com/resources/images/ads/duck-duck-goose.jpg" />
                  </div>
               </div>
               <div class="card">
                  <div class="card-header text-center">
                     Movie ad
                  </div>
                  <div class="card-text">
                     <img class="img-fluid" src="https://www.haxstar.com/resources/images/ads/ducktales.jpg" />
                  </div>
               </div>
               <div class="card">
                  <div class="card-header text-center">
                     Tv Show ad
                  </div>
                  <div class="card-text">
                     <img class="img-fluid" src="https://www.haxstar.com/resources/images/ads/duck-dodgers.jpg" />
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- This script tag have to run after the html elements have been loaded -->
      <script type="text/javascript" src="https://haxstar.com/resources/js/feed.js?v=1.4"></script>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/repeated/footer.php'; ?> <!-- Getting the code from footer.php file. -->
   </body>
</html>
