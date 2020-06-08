<?php
  include('php/scripts/auth/loginCheck.php');
  if(loginCheck()){
    header("Location: http://localhost" . $_GET['redirect']);
    exit;
  }


  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION['email']) && $_SESSION["loggedin"] === true){
      header("location: welcome.php");
      exit;
  }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; margin: 0 auto;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="php/scripts/auth/signin.php" method="post">
            <input type="hidden" name="redirect" value="<?php echo($_GET['redirect']) ?>" >
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" >
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account?
              <a href="register.php?redirect=<?php echo($_GET['redirect']) ?>">
                Sign up now
              </a>.
            </p>
        </form>
    </div>
</body>
</html>
