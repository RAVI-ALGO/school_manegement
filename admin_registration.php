<?php
include("db_connection.php");
include("sessionFile.php");
session_start();
if (isset($_POST['signup'])) {
  $ename=$_POST['employee_name'];
  $eid=$_POST['employeeId'];
  $mobile=$_POST['mobile'];
  $userName = $_POST['uname'];
  $password = $_POST['password'];
  $selectQuery=mysqli_query($connection,"SELECT *FROM admin_login WHERE employee_id='$eid'");
  $Row_count=mysqli_num_rows($selectQuery);
  if($Row_count==0)
  {
    $_SESSION['employee_id']=$eid;
  $AdminLoginQuery = mysqli_query($connection, "INSERT INTO  admin_login(employee_name,employee_id,mobile,User_name,Password)VALUES('$ename','$eid','$mobile','$userName','$password')");
  // echo$row_count;
  if ($AdminLoginQuery) 
  {
    header("location:thank_you.php ? $");
  } 
  else
  {
    header("location:admin_registration.php");

  }
}
else{
  $msg="* Employee already registered.";
}
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/coustom.js"></script>
  <title>Admin Registration</title>
</head>

<body>
  <?php include "header.php"; ?>
  <div class="container-fluid">
    <a href="index.php" class="btn btn-primary mt-1">Go TO Login Page</a>
  </div>
  <div class="mt-2 mb-4">
    <div class="modal-dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #63B7AF;">
            <h2 class="text-light">Create New Account</h2>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <span class="text-danger"><?php if(isset($msg)){ echo$msg;} ?></span>
            <form method="POST">
                <div class="row mt-1">
                  <div class="col-sm-6">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <label>Employee name</label>
                    <input type="text" id="ename" name="employee_name"  class="form-control mt-1 text-capitalize" required size="20" minlength="3" maxlength="20" required>
                  </div>
                  <div class="col-sm-6">
                  <label>Employee Id</label>
                      <input type="text" id="eid" name="employeeId" class="form-control mt-1"required size="8" minlength="5" maxlength="8" required>
                      <p class="text-danger fs-6"> *E-id should 5 to 8 character</p>

                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <label>User name</label>
                      <input type="text" id="uname" name="uname"required size="20" minlength="3" maxlength="20" class="form-control" required>
                  </div>
                  <div class="col-sm-6">
                  <i class="fa fa-mobile" aria-hidden="true"></i>
                      <label>mobile </label>
                      <input type="text" name="mobile" class="form-control has-validation">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <i class="fa fa-lock prefix grey-text"></i>
                      <label>Password </label>
                      <input type="password"  id="pass1" class="form-control " required>
                  </div>
                  <div class="col-sm-6">
                  <i class="fa fa-lock prefix grey-text"></i>
                      <label> Confirm Password </label>
                      <input type="password" name="password" id="pass2" class="form-control " required>
                      <span id="errormsg"></span>
                  </div>
                </div>
              <div class="form-group d-flex justify-content-center mt-2">
                <button type="submit" name="signup" class="btn btn-primary btn-lg w-25">Signup</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer style="margin-top: 60px;"><?php include("footer.php"); ?></footer>
</body>
</html>