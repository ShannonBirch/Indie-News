<?php

/* - Checks if the email is in the system
      -- If it isn't return an error to login screen
   - Checks if the hashed password matches with verify() [loginTools]
      -- If it doesn't return an error to login screen
   - Creates a token
      -- Updates the token in the database
        --- TODO: add User-tokens table to allow for multiple logins at once
      -- Stores the token as a session
   - Redirects back to the screen before the login page*/

include('secure/Conn.php');
include('secure/loginTools.php');
  $email = $_POST['email'];
  $redirect = $_POST['redirect'];







  $checkEmailSQL = "SELECT email, password
                    FROM Users
                    WHERE email='" . $email . "';";

  $sConn = getConn();
  $result = $sConn->query($checkEmailSQL);

  if($result->num_rows>0){ // Email found check
    $row=$result->fetch_assoc();
    if(verify($_POST['password'], $row['password'])){ //Password matches
      session_start();
      $token = generateToken();
      $addTokenSQL = "UPDATE Users
                  SET token='" . $token ."'
                  WHERE email='" . $email . "';"; //ToDo add User-Tokens database so users can be logged in multiple times


      $tokenResult = $sConn->query($addTokenSQL);
      if($tokenResult){
        $sConn->close();
        $_SESSION['email'] = $email;
        $_SESSION['token'] = $token; //By not setting last checked the next loginCheck will make sure the token worked
        header("location: http://localhost" . $redirect); //Redirect back to the original page
        exit;
      }
    }
  }
  /*
    Redirect to the login screen
  */
  $sConn->close();
  header("location: http://localhost/login.php?error=u&redirect=" . $redirect);
  exit;
