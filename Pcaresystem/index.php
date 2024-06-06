<?php
//session_start();
include('script.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: black;
      height: 100vh;
      margin: 0;
      overflow: hidden;
      background-image: url('assets/img/register_bg_2.png');
      background-repeat: no-repeat;
      background-size: cover;
    }
    .sign-in-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 30px;
      border-radius: 10px;
    }
    .colorful-shapes {
      position: absolute;
      top: -30%;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }
    label{
        color: gray-500;
        font-weight: bold;
    }
  </style>
</head>
<body>
<form method="POST" action="" style="display: block;">
  <div class="sign-in-container">
    <h4 class="h4-text text-center">Sign In To PMS</h4>

<?php 
//$sq="Real@1234";
//$sp = 'Real@12';
//echo password_hash($sp, PASSWORD_DEFAULT);
?>
<hr class="mt-6 border-b-2 border-gray-400" />

  <p class="text text-align-center" id="doctorError" style="color:red;"><?php echo htmlspecialchars($doctorError); ?></p>
  <div class="form-group">
    <label for="email">Username/Email</label>
    <input type="text" class="form-control" name="uname" id="uname" value="<?php echo htmlspecialchars($doctorUname); ?>" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="pass" id="password" value="" placeholder="Enter password">
  </div>
  <div id="doctor" style="display: block;" >
  <button type="submit" class="btn btn-success btn-block" name="loginDoctor">SIGN IN</button></div>
 
</form>

</body>
</html>