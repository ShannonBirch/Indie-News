<?php
include('auth/secure/Conn.php');
include('auth/secure/loginTools.php');

//This file has some test utilities
session_start();
function setToken(){ //AKA cheat login
  echo("Setting tokens");
  $_SESSION['email'] = "test@test.com";
  $_SESSION['token'] = "test";
}

function destroySession(){
  echo("Destroying Session");
  session_destroy();
}

function quickRegister($email, $passW){
  $pass   = generateHash($passW, $email);


$registerSQL = "INSERT INTO Users
                (`email`,  `Author`, `password`)
                VALUES
                ('" . $email ."', 1, '" . $pass ."')";

$rConn = getConn();
  // echo ($registerSQL);
  echo $rConn->query($registerSQL) ? "true" : "false";

$rConn->close();
echo "Registered";
}

destroySession();
// setToken();
// quickRegister("dude", "Dude2");
