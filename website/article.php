<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* TODO:
- Retrieve info for page from database
  -- Article Info:
    --- Article
    --- Headline
    --- Body
    --- Thumbnail
    --- Post time
    --- Tags - Probably later
    --- Sources
    --- Location
  -- Author info:
    --- user_id (To find the Authors other posts)
    --- f_name, l_name
    --- footer
*/

include('php/scripts/auth/loginCheck.php');
loginCheck();

if(isset($_GET['article_id'])){
  $conn = getConn();
  $articleID = $conn->real_escape_string($_GET['article_id']);


  $getArticleSQL = "SELECT
                      a.article_id,
                      a.headline,
                      a.body,
                      a.thumbnail,
                      a.post_time,
                      a.sources,
                      a.location,
                      u.user_id,
                      u.f_name,
                      u.l_name,
                      u.footer
                    FROM
                     articles a
                    RIGHT JOIN
                     Users u
                    ON
                     a.user_id = u.user_id
                    WHERE a.article_id='" . $articleID ."';";

  $articleResult = $conn->query($getArticleSQL);
  $conn->close();

  if($articleResult->num_rows>0){ //Did we get information about the article?
    $articleInfo = $articleResult->fetch_assoc(); //We can now use this to render the page
  }else{ //If we didn't we need to handle that error as the page won't load
    echo($getArticleSQL);
  }
}

 ?>
 <head>
   <link rel="stylesheet" href="resources/css/navbar.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="resources/css/main.css">

   <script src="https://apis.google.com/js/platform.js" async defer></script>
   <meta name="google-signin-client_id" content="1056495120367-hu0imhfklj8epugmvqoa88cugiqifc0e.apps.googleusercontent.com">

   <title>Indie News - <?=$articleInfo['headline']?></title>

 </head>
 <body>
   <?php require_once('php/partials/navbar.php');?>


   <div class="wrapper">
      <div class="aticle-headline">
        <h1><?=$articleInfo['headline']?></h1><br />
        <div class="dateName">
          By
          <b> <a href="/authorpage?id=<?=$articleInfo['user_id']?>">
                <?=$articleInfo['f_name']?> <?=$articleInfo['l_name']?>
              </a></b><br />
          <?=$articleInfo['post_time']?>
        </div>
      </div>
      <hr />
      <div class="article-body">
        <?=$articleInfo['body']?>
      </div>
      <hr />
      <div class="article-footer">
        <?=$articleInfo['footer']?>
      </div>

   </div>
 </body>



  <div>
  </div>
</body>
