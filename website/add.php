<!--
  This page will likely need to use javascript.
  That's ok

  - Inputs include:
    - Headline - small textbox
    - Body - Bigger text
    - Thumbnail - Image upload/link
    - Blurb - bigger text
    - sources - medium textbox
    - tags - small textbox - add as you go - ToDo: Article-tags db
    - location - small textbox

  - If there's an error it needs to redirect back with everything still filled out.
    - Might want to do error handling with javascript

-->

<?php

  include('php/scripts/auth/loginCheck.php');
  loginCheck();


 ?>
<html>
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
  <div class="wrapper">
    <h2>Add Article </h2>
    <form enctype="multipart/form-data" action="php/scripts/add.php" method="post">
      <div class="form=group">
        <label>Headline</label>
        <input type="text" name ="headline" class="form-control">
        <span class="help-block"></span>
      </div>
      <div class="form=group">
        <label>Body</label><br />
        <textarea rows="20" cols="100" name="body"></textarea><br />
        <span class="help-block"></span>
      </div>
      <div class="form=group">
        <label>Thumbnail</label>
        <input type="file" name ="thumbnail" class="form-control">
        <span class="help-block"></span>
      </div>
      <div class="form=group">
        <label>Blurb</label><br />
        <textarea rows="10" cols="100" name="blurb"></textarea><br />
        <span class="help-block"></span>
      </div>
      <div class="form=group">
        <label>Sources</label><br />
        <textarea rows="10" cols="100" name="sources"></textarea><br />
        <span class="help-block"></span>
      </div>
      <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
      </div>
    </form>
  </div>
</body>
</html>
