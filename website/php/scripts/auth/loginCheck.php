<?php
session_start();

include('secure/Conn.php');

function loginCheck(){
  if(isset($_SESSION['email']) && isset($_SESSION['token'])){
    if(
        isset($_SESSION['last_checked'])
        &&
        ( (time() - $_SESSION['last_checked']) < 300)
      ){ //If the user logged in recently we don't need to check with the server again

      return true;
    }

    $checkLoggedInSQL = "SELECT email
                          FROM Users
                          WHERE email ='" . $_SESSION['email'] . "'
                          AND token = '" . $_SESSION['token'] . "';";

    $lConn = getConn();
    $result = $lConn->query($checkLoggedInSQL);
    $lConn->close();
    if($result->num_rows > 0){
      $_SESSION['last_checked'] = time();
      return true;
    }
  }

  return false;

}


// echo loginCheck() ? "true" : "false";
