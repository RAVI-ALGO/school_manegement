<?php
session_start();
include("db_connection.php");

if(isset($_POST['loginbtn']))
{
  $userName=$_POST['uname'];
  $password=$_POST['password'];
  $AdminLoginQuery=mysqli_query($connection,"SELECT*FROM admin_login WHERE User_name='$userName'&&Password='$password'");
  $row_count=mysqli_num_rows($AdminLoginQuery);
  // echo$row_count;
  if($row_count>0)
  {
    $_SESSION['uname']=$userName;
      //header("location:Home.php");
  }
  else
  {
      $msg="Username or Password not matched";
  }
}
if(isset($_SESSION['uname']))
{
  header("location:Home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
      .form-control {
    width: 85%;
}
    </style>
    <script src="js/main.js"></script>
    <title>index</title>
</head>
<body>
    <?php include"header.php"; ?>
    <div class="mt-2 mb-5" id="login_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #FFA8A8;">
          <h3 class="text-light mx-auto ">Admin LogIn</h3>
        </div>
        <div class="modal-body"style="background-color: #EEEEEE;">
           <center> <span class="text-danger"><?php if(isset($msg)){echo$msg;} ?></span></center>
          <form method="POST">
            <div class="form-group">
            <i class="fa fa-user-o" aria-hidden="true"></i>
              <label>User name </label>
              <input type="text" name="uname" class="form-control">
            </div>
            <div class="form-group mt-1">
              <i class="fa fa-lock prefix grey-text"></i>
              <label>Password </label><br>
              <input type="password" name="password"  id="pass1" onkeyup="match_regex()" class="form-control d-inline">  <i class="fa fa-eye-slash d-inline" id="eye" aria-hidden="true" style="font-size: 23px; cursor: pointer;" onclick="eye_change()"></i>
              <br>
              <span id="msg"></span>
            </div>
            <div class="form-group d-grid gap-2 col-3 mt-4 mx-auto">
               <input type="submit" name="loginbtn" value="Login" class="btn btn-primary ">
            </div>
            <div class="from-group text-center mt-3">
            <a href="admin_registration.php" class="link-primary ">Create new account</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="fixed-bottom">  <?php include"footer.php"; ?></div>
</body>
</html>