<?php

include('auth/secure/Conn.php');
session_start();

$headline = $_POST['headline'];
$body = $_POST['body'];
$thumbnail = '';
$blurb = $_POST['blurb'];
$sources = $_POST['sources'];

$check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
if($check !== false) {

  $target_dir = "../../resources/pics/thumbs/";
  $target_file = $target_dir . basename($_FILES['thumbnail']['name']);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));





  if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
    $thumbnail = basename( $_FILES["thumbnail"]["name"]);
  } else {
    //Handle image error
    // - Redirect?
  }



} else { //No image or file not an image. TODO: If it's not an image redirect
  $thumbnail = "no_pic.png";
}


$addSQL = "INSERT INTO articles
(`user_id`,  `headline`, `body`, `thumbnail`, `blurb`, `sources`, `location`, `tags`)
VALUES
(
  (SELECT user_id FROM Users WHERE email = '" . $_SESSION['email'] . "'),
  '" . $headline . "',
  '" . $body . "',
  '" . $thumbnail . "',
  '" . $blurb . "',
  '" . $sources . "',
  'HardCod,ED',
  'HC2'
);";

$conn = getConn();

if($conn->query($addSQL)){
  echo "worked?"; //TODO: Redirect to homepage? Author section?
}else{
  //TODO handle errors
}

$conn->close();
