<?php
//This gets the connection the mysql server
include('../auth/Conn.php');
$conn = getConn();


$getArticles = "SELECT *
                  FROM articles;";

$articlesResult = $conn->query($getArticles);
$conn->close();
if($articlesResult->num_rows>0){
  while($row=$articlesResult->fetch_assoc()){
    $articleID  = $row["article_id"];
    $headline   = $row["headline"];
    $date       = $row["post_time"];
    $body       = $row["body"];
    $author     = "Darragh Kelly"; // Todo: Add Authors to database

    $filename   = "/articles/" . $articleID . ".php";

    $pageContent = "<head>
                      <link rel='stylesheet' href='../resources/css/navbar.css'>
                      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
                      <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
                      <link rel='stylesheet' href='../resources/css/main.css'>

                      <title> $headline - Indie News</title>
                    </head>
                    <body>
                      <?php
                        include('partials/navbar.php');
                       ?>


                      <div class='wrapper'>
                        <div class='articleHeader'>
                          <h1>$headline</h1><br />
                          by $author on $date
                        </div>
                        <div class='articleBody'>
                            $body
                        </div>
                        <div class='articleFooter'>
                            $author
                        </div>

                      </div>
                    </body>";



    $fp = fopen("../..", $filename, "w+");
    fwrite($fp, $pageContent);
    fclose($fp);

  }

}


echo "Success?";


 ?>
