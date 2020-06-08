<?php
  session_start();
  if(isset($_SESSION['test'])){
      unset($_SESSION['test']);

  }else{
    include('php/scripts/auth/loginCheck.php');
    if(!loginCheck()){
      header("Location: /login.php?redirect=" . $_SERVER['REQUEST_URI']);
      exit;
    }
  }
