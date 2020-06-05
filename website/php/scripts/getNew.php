<?php
  //This gets the connection the mysql server
  include('auth/Conn.php');
  $conn = getConn();

  $output = "<root>"; //This is the beginning of defining an .xml file
  header('content-Type: text/xml');

  $getArticles = "SELECT  a.article_id,
                          a.user_id,
                          u.f_name, u.l_name, u.footer,
                          a.headline, a.blurb, a.thumbnail,
                          a.body, a.post_time

                    FROM articles a
                    LEFT JOIN Users u
                    ON a.user_id = u.user_id
                    ORDER BY post_time desc;";

  $articlesResult = $conn->query($getArticles);
  if($articlesResult->num_rows>0){
    while($row=$articlesResult->fetch_assoc()){
       // print_r($row);
      $output.="<article>
                  <article_id>" . $row["article_id"]  . "</article_id>
                  <user_id>"    . $row["user_id"]     . "</user_id>
                  <author>"     . $row["f_name"] . " ". $row["l_name"]      . "</author>
                  <headline>"   . $row["headline"]    . "</headline>
                  <blurb>"      . $row["blurb"]       . "</blurb>
                  <thumbnail>"  . $row["thumbnail"]   . "</thumbnail>
                  <body>"       . $row["body"]        . "</body>
                  <post_time>"  . $row["post_time"]   . "</post_time>
                  <footer>"     . $row["footer"]      . "</footer>
                </article>";
    }

  }

  $output .= "</root>";
  $conn->close();

  print($output);


 ?>
