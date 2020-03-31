<head>
  <title>Indie News - News and stuff</title>

</head>
<body>
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
      var articleBody = articles.getElementsByTagName("body");

      document.write("<h1>");
      document.write(headline[0].textContent.toString());
      document.write("</h1><br />");
      document.write(articleBody[0].textContent.toString());

    }
  </script>
</body>
