<?php
session_start();

include('secure/Conn.php');

function loginCheck(){
  $reqPage = explode('?', $_SERVER['REQUEST_URI'], 2);
  if(isset($_SESSION['email']) && isset($_SESSION['token'])){
    if(
        isset($_SESSION['last_checked'])
        &&
        ( (time() - $_SESSION['last_checked']) < 300)
      ){ //If the user logged in recently we don't need to check with the server again

        if( $reqPage[0] === "/login.php" ){

            header("Location: /");
            exit;
          }
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

      if( $reqPage[0] === "/login.php" ){

        header("Location: /");
        exit;
      }
      return true;
    }
  }

  if( !( $reqPage[0] === "/login.php" ) ){

    header("Location: /login.php?redirect=" . $_SERVER['REQUEST_URI']);
    exit;
  }
  return false;

}
