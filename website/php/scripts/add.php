<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('auth/secure/Conn.php');
session_start();

$headline = $_POST['headline'];
$body = $_POST['body'];
$blurb = $_POST['blurb'];
$sources = $_POST['sources'];
$thumbnail = '';

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

$conn = getConn();
$headline = $conn->real_escape_string($_POST['headline']);
$body = $conn->real_escape_string($_POST['body']);
$blurb = $conn->real_escape_string($_POST['blurb']);
$sources = $conn->real_escape_string($_POST['sources']);

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


if($conn->query($addSQL)){
  $conn->close();
  header("location: http://localhost"); //TODO: redirect to author section
  exit;
}else{
  //TODO handle errors
  echo $addSQL;
  echo($headline);
}

$conn->close();
