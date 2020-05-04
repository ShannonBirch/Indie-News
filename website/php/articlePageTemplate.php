<head>
  <link rel='stylesheet' href='../resources/css/navbar.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
  <link rel='stylesheet' href='../resources/css/main.css'>

  <title> $HEADLINE - Indie News</title>
</head>
<body>
  <?php
    include('partials/navbar.php');
   ?>


  <div class='wrapper'>
    <div class='articleHeader'>
      <h1>$HEADLINE</h1><br />
      by $AUTHOR on $DATE
    </div>
    <div class='articleBody'>
        $BODY
    </div>
    <div class='articleFooter'>
        $AUTHOR
    </div>

  </div>
</body>
