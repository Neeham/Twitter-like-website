<?php
session_start();
if (isset($_COOKIE["cookieID"])) {
  $_SESSION["sessionID"]               = $_COOKIE["cookieID"];
  $_SESSION["sessionUsername"]         = $_COOKIE["cookieUsername"];
  $_SESSION["sessionActivated"]        = $_COOKIE["cookieActivated"];
  $_SESSION["sessionLastLoggedIn"]     = $_COOKIE["cookieLoggedIn"];
}
?>
<head>
  <!--NEED TO RE-ADD THIS SCRIPT WITH MORE CONTENT FOR GOOGLE APPROVAL -->
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
       (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-7253133501830941",
            enable_page_level_ads: true
       });
  </script>
   <title>Quacker</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
   <link rel="apple-touch-icon" sizes="180x180" href="https://haxstar.com/resources/images/favicon/apple-touch-icon.png?v=1.2">
   <link rel="icon" type="image/png" sizes="32x32" href="https://haxstar.com/resources/images/favicon/favicon-32x32.png?v=1.2">
   <link rel="icon" type="image/png" sizes="16x16" href="https://haxstar.com/resources/images/favicon/favicon-16x16.png?v=1.2">
   <link rel="manifest" href="https://haxstar.com/resources/images/favicon/site.webmanifest?v=1.2">
   <link rel="mask-icon" href="https://haxstar.com/resources/images/favicon/safari-pinned-tab.svg?v=1.2" color="#5bbad5">
   <link rel="shortcut icon" href="https://haxstar.com/resources/images/favicon/favicon.ico?v=1.2">
   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="msapplication-config" content="https://haxstar.com/resources/images/favicon/browserconfig.xml?v=1.2">
   <meta name="theme-color" content="#ffffff">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js?v=1.2"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css?v=1.2">
   <link rel="stylesheet" type="text/css" href="https://haxstar.com/resources/css/custom.css?v=1.2">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css?v=1.2"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js?v=1.2"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js?v=1.2"></script>
   <link rel="stylesheet" href="https://haxstar.com/resources/css/croppie.css?v=1.2" />
   <script src="https://haxstar.com/resources/js/croppie.js?v=1.2"></script>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/assets/alert.php'; ?>
</head>
