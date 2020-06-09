<?php

  include('php/scripts/auth/loginCheck.php');
  loginCheck();

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
   <?php
     include('php/partials/navbar.php');
    ?>


   <div class="wrapper">
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

       var articleIDs     = articles.getElementsByTagName("article_id")
       var headlines      = articles.getElementsByTagName("headline");
       var articleBlurbs  = articles.getElementsByTagName("blurb");
       var articleThumbs  = articles.getElementsByTagName("thumbnail");

       // Retrieve each customer in turn.
       for (var i = 0; i < articles.children.length; i++)
       {


         document.write("<a href='http://localhost/article/" + articleIDs[i].textContent.toString()+".php'><div class='row'><div class='col-md-6'><h1>");
             document.write(headlines[i].textContent.toString());
             document.write("</h1><br />");
             document.write(articleBlurbs[i].textContent.toString());
         document.write("</div>");
         document.write("<div class='col-s-6'>");
             document.write("<img class='thumbnail' src='resources/pics/thumbs/" + articleThumbs[i].textContent.toString() + "'>");
         document.write("</div></div></a>");
       }



     </script>
   </div>
 </body>



  <div>
  </div>
</body>
