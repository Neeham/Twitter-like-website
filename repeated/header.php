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
   <title>Quacker</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
   <link rel="apple-touch-icon" sizes="180x180" href="https://haxstar.com/resources/images/favicon/apple-touch-icon.png?v=6.0">
   <link rel="icon" type="image/png" sizes="32x32" href="https://haxstar.com/resources/images/favicon/favicon-32x32.png?v=6.0">
   <link rel="icon" type="image/png" sizes="16x16" href="https://haxstar.com/resources/images/favicon/favicon-16x16.png?v=6.0">
   <link rel="mask-icon" href="https://haxstar.com/resources/images/favicon/safari-pinned-tab.svg?v=6.0" color="#5bbad5">
   <link rel="shortcut icon" href="https://haxstar.com/resources/images/favicon/favicon.ico?v=6.0">
   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="msapplication-config" content="https://haxstar.com/resources/images/favicon/browserconfig.xml?v=6.0">
   <meta name="theme-color" content="#ffffff">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css?v=6.0">
   <link rel="stylesheet" type="text/css" href="https://haxstar.com/resources/css/custom.css?v=6.0">
   <link rel="stylesheet" href="https://haxstar.com/resources/css/croppie.css?v=6.0" />
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css?v=6.0"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js?v=6.0"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js?v=6.0"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js?v=6.0"></script>
   <script src="https://haxstar.com/resources/js/croppie.js?v=6.0"></script>
   <script src="https://haxstar.com/resources/js/custom.js?v=6.0"></script>
</head>
