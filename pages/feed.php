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
      <div class="col-md-2"> <!-- Display ads on the feed page, LEFT column -->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- quackerLeft -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7253133501830941"
     data-ad-slot="8541286842"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
      </div>
      <div class="col-md-8">
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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- quackerRight -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7253133501830941"
     data-ad-slot="5357075527"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
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
