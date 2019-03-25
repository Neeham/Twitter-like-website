<!DOCTYPE html>
<?php
   require $_SERVER['DOCUMENT_ROOT'] . '/repeated/navbar.php'; //Getting the code from navbar.php file.
   require $_SERVER['DOCUMENT_ROOT'] . '/assets/query.php'; //Getting the code from query.php file.
   ?>
<html lang="en">
   <body id="feed-bg">
      <div class="container-fluid content">
         <div class="col-md-2 d-none d-lg-block left">
            <div class="card"> <!-- Display ads on the feed page, LEFT column -->
               <img class="img-fluid w-100" src="https://www.haxstar.com/resources/images/ads/howard-the-duck.jpg" /><br>
               <br><img class="img-fluid w-100" src="https://www.haxstar.com/resources/images/ads/fancyduck.jpg" /><br>
               <br><img class="img-fluid w-100" src="https://www.haxstar.com/resources/images/ads/lucky-duck.jpg" />
            </div>
         </div>
         <div class="col-md-8 mid">
            <div class="card">
               <h2 class="display-4 text-danger" align="center" >Post a Quack</h2>
               <div class="form-group">
                  <form class="form-group" action="../assets/query" method="post">
                     <textarea class="form-control" id="quack-box" oninput = "setCounter()" rows="4" name="tweet" maxlength="255" required placeholder="Quack it ..."></textarea>
                     <br>
                     <span class="my-2" id="quack-limit">0/255</span>
                     <button class="btn float-right quack-btn orangeColorButton" name="postQuackBtn" id="quack-button"
                        type="submit">Quack</button><br>
                     </button>
                  </form>
               </div>
            </div>
            <br>
            <div class="card-header text-center">Your Feed</div>
            <ul class="list-group" id="quack-list">
               <?php printFeed(); ?> <!-- Display Quacks -->
            </ul>
         </div>
         <div class="col-md-2 d-none d-lg-block right"> <!-- Display ads on the feed page, Right column -->
            <div class="card">
               <img class="img-fluid w-100" src="https://www.haxstar.com/resources/images/ads/duck-duck-goose.jpg" /><br>
               <br><img class="img-fluid w-100" src="https://www.haxstar.com/resources/images/ads/ducktales.jpg" /><br>
               <br><img class="img-fluid w-100" src="https://www.haxstar.com/resources/images/ads/duck-dodgers.jpg" />
            </div>
         </div>
      </div>
      <!-- This script tag have to run after the html elements have been loaded -->
      <script type="text/javascript" src="https://haxstar.com/resources/js/feed.js?v=1.4"></script>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/repeated/footer.php'; ?> <!-- Getting the code from footer.php file. -->
   </body>
</html>
