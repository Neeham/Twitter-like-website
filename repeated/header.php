<?php
   session_start();
   if (isset($_COOKIE["cookieID"])) { //Check if cookies exists and set the sessions if it does.
     $_SESSION["sessionID"]               = $_COOKIE["cookieID"];
     $_SESSION["sessionUsername"]         = $_COOKIE["cookieUsername"];
     $_SESSION["sessionActivated"]        = $_COOKIE["cookieActivated"];
     $_SESSION["sessionLastLoggedIn"]     = $_COOKIE["cookieLoggedIn"];
   }
   ?>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Quacker - Don't be wack!</title>
   <!-- Ad block detection -->
   <script> var adblock = true; </script>
   <script src="https://haxstar.com/resources/js/adsbygoogle.js"></script>
   <!-- Font Signika -->
   <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
   <!-- Favicon -->
   <link rel="apple-touch-icon" sizes="180x180" href="https://haxstar.com/resources/images/favicon/apple-touch-icon.png?v=8.0">
   <link rel="icon" type="image/png" sizes="32x32" href="https://haxstar.com/resources/images/favicon/favicon-32x32.png?v=8.0">
   <link rel="icon" type="image/png" sizes="16x16" href="https://haxstar.com/resources/images/favicon/favicon-16x16.png?v=8.0">
   <link rel="mask-icon" href="https://haxstar.com/resources/images/favicon/safari-pinned-tab.svg?v=8.0" color="#5bbad5">
   <link rel="shortcut icon" href="https://haxstar.com/resources/images/favicon/favicon.ico?v=8.0">
   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="msapplication-config" content="https://haxstar.com/resources/images/favicon/browserconfig.xml?v=8.0">
   <meta name="theme-color" content="#ffffff">
   <!-- CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css?v=8.0"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://haxstar.com/resources/css/custom.css?v=9.4">
   <link rel="stylesheet" href="https://haxstar.com/resources/css/croppie.css?v=8.0">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css?v=8.0"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   <!-- JS -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?v=8.0"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js?=8.0"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js?=8.0"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="https://haxstar.com/resources/js/croppie.js?v=8.0"></script>
   <script src="https://haxstar.com/resources/js/custom.js?v=8.0"></script>
   <script src="https://unpkg.com/tippy.js@4?v=8.05"></script>
</head>
