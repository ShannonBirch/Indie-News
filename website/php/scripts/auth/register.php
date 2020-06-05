<?php

  include('secure/Conn.php');
  include('secure/loginTools.php');


  // $user = $_POST['email'];

  // echo($user);
  //
  // INSERT INTO `Users`
  //           (`user_id`, `email`, `d_o_b`, `f_name`, `l_name`, `footer`, `Author`, `password`, `registered`, `token`)
  //           VALUES
  //           ('5', 'adafadaf', '2020-06-17', 'adfafda', 'adfafdad', 'adafds', '1', 'fafdafdfa', CURRENT_TIMESTAMP, 'adfadafdad');


  $email  = "test2";
  $dob    = '2020-06-17';
  $pass   = generateHash("testPass", $email);


$registerSQL = "INSERT INTO Users
                (`email`,  `Author`, `password`)
                VALUES
                ('" . $email ."', 1, '" . $pass ."')";

$rConn = getConn();
  // echo ($registerSQL);
  echo $rConn->query($registerSQL) ? "true" : "false";

$rConn->close();
