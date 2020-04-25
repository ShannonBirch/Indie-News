<head>
  <link rel="stylesheet" href="resources/css/navbar.css">
  <link rel="stylesheet" href="resources/css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <title>Indie News - News and stuff</title>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark navbar-survival101">
  <div class="container">
    <a class="navbar-brand" href="">
      <!-- Todo: Put image here -->
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">New</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Popular</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Following</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">More <i class="ion-ios-arrow-down"></i></a>
        </li>
      </ul>
      <form class="form-inline">
        <div class="input-group search-box">
          <input type="text" class="form-control" placeholder="What are you looking for?" aria-label="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="ion-search"></i></button>
          </span>
        </div>
      </form>
    </div>
  </div>

</nav>



  <script language="JavaScript">

    var connection = new XMLHttpRequest();
    // Define which file to open and
    // send the request.
    connection.open("GET", "php/scripts/getNew.php", false);
    connection.setRequestHeader("Content-Type", "text/xml");
    connection.send(null);
    var xmlNew = connection.responseXML;
    // Place the root node in an element.
    var articles = xmlNew.childNodes[0];
    // Retrieve each customer in turn.
    for (var i = 0; i < articles.children.length; i++)
    {
      var headline    = articles.getElementsByTagName("headline");
      var articleBlurb = articles.getElementsByTagName("blurb");
      var articleThumb = articles.getElementsByTagName("thumbnail");

      document.write("<h1>");
      document.write(headline[i].textContent.toString());
      document.write("</h1><br />");
      document.write(articleBlurb[i].textContent.toString());
      document.write("<img class='thumbnail' src='resources/pics/thumbs/" + articleThumb[i].textContent.toString() + "'>")

    }
  </script>
</body>
