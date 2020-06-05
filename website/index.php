<?php

  include('php/scripts/auth/loginCheck.php');
  if(!loginCheck()){
    header("Location: /login.php?redirect=" . $_SERVER['REQUEST_URI']);
  }

 ?>
<head>
  <link rel="stylesheet" href="resources/css/navbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="resources/css/main.css">

  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="1056495120367-hu0imhfklj8epugmvqoa88cugiqifc0e.apps.googleusercontent.com">

  <title>Indie News - News and stuff</title>

</head>
<body>



  <div>
  </div>
</body>
