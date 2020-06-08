/*
- Check if passwords match ---
-- if not redirect back to register page ---
- Check if email already in use ---
-- Redirect back to register page ---
- Add the new user to the Database
- Sign the user in via session


*/
<?php

  include('secure/Conn.php');
  include('secure/loginTools.php');

  $redirect = $_POST['redirect'];

  if($_POST['password']  == $_POST['confirm_password']){
    $rConn = getConn();
    $email  = $_POST['email'];;


    $checkEmailSQL = "SELECT Email
                      FROM Users
                      WHERE email='" . $email . "';";

    $checkEmailResult = $rConn->query($checkEmailSQL);

    if($checkEmailResult->num_rows==0){ // No matching email found in database
      $pass   = generateHash($_POST['password'], $email);
      $token = generateToken();

      $registerSQL = "INSERT INTO Users
      (`email`,  `Author`, `password`, `token`)
      VALUES
      ('" . $email ."', 0, '" . $pass ."', '" . $token ."')";

      if($rConn->query($registerSQL)){ //Added to the databse
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['token'] = $token;
        header("location: http://localhost" . $redirect); //Redirect back to the original page
        exit;
      }


    }

    $rConn->close();
    header("location: http://localhost/login.php?error=e&redirect=" . $redirect); // Error e: email in use
    exit;
  }

  header("location: http://localhost/login.php?error=p&redirect=" . $redirect); // Error p: passwords don't match
  exit;
