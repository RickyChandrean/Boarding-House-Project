<?php 
require '../Functions/func.php';

session_start();
if(isset($_SESSION['admin'])){
 header("Location: homeadmin.php");
}

if( isset($_POST["register"])){
    if( register($_POST) > 0 ){
        echo "<script>
                alert('Register success');        
            </script>";
            header("Location: login.php");
    } else {
        echo mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/loginstyle.css">
  <title>Admin Registration Page</title>
  <style>
  label {
    display: block;
  }
  </style>
</head>

<body>
  <div class="bg-image"></div>
  <div class="container">
    <div class="center">
      <ul>
        <h1>Registration Page</h1>
      </ul>


      <form action="" method="post">
        <!--Q1-->
        <div class="txt_field">
          <input type="text" name="username" class="form-label" id="username" aria-describedby="emailHelp" required>
          <label for="username" class="form-label">Username</label>
          <span></span>
        </div>

        <!--Q2-->
        <div class="txt_field">
          <input type="password" name="password" class="form-label" id="password" aria-describedby="emailHelp" required>
          <label for="password" class="form-label">Password</label>
          <span></span>
        </div>

        <!--Q3-->
        <div class="txt_field">
          <input type="password" name="password2" class="form-label" id="password2" aria-describedby="emailHelp"
            required>
          <label for="password2" class="form-label">Confirm Password</label>
          <span></span>
        </div>

        <input type="submit" name="register" value="signup">
        <br><br>
        <div class="signup_link">
          <a href="login.php">Login</a>
        </div>



      </form>
    </div>
  </div>
</body>

</html>