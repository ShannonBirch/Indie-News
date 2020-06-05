<?php
include('secure/Conn.php');
  $email = $_POST['email']);
  echo($_POST['password']);

$sConn = getConn();



//TODO:
  // - Check if the email is in the system
  //   -- If it isn't return an error to login screen
  // - Check if the hashed password matches with verify() [loginTools]
  //   -- If it doesn't return an error to login screen
  // - Create a token
  //   -- Store the token as a session
  // - Redirect back to the previous screen

if($true){
  header("location: http://localhost");
  exit;
}else{
  // echo($_SERVER['REQUEST_URI']);
  $params = ''; // Params can explain why sign-in failed
  // header("location: http://localhost/login.php?" . $params);
  // exit;
}
