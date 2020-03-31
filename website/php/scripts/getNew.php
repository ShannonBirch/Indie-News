<?php
  //This gets the connection the mysql server
  include('auth/Conn.php');
  $conn = getConn();

  $output = "<root>"; //This is the beginning of defining an .xml file
  header('content-Type: text/xml');

  $getArticles = "SELECT *
                    FROM articles;";

  $articlesResult = $conn->query($getArticles);
  if($articlesResult->num_rows>0){
    while($row=$articlesResult->fetch_assoc()){
      $output.="<article>

                  <headline>" . $row["headline"] . "</headline>
                  <body>" . $row["body"] . "</body>
                  <post_time>" . $row["post_time"] . "</post_time>
                </article>";
    }

  }

  $output .= "</root>";
  $conn->close();

  print($output);


 ?>
