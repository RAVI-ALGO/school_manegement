<?php 
include("db_connection.php");
include("sessionFile.php");

session_start();
$eid=$_SESSION['employee_id'];
$selectQuery=mysqli_query($connection,"SELECT * FROM admin_login WHERE employee_id='$eid'");
$FetchData=mysqli_fetch_array($selectQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</html>

<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<title>thank you</title>
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <a href="index.php" class="btn btn-primary mt-1">Go TO Login Page</a>
    </div>


    <div class="modal-dialog ">
            <div class="modal-top justify-content-center">
                <img class="modal-icon w-50" style="margin-left: 100px;" src="https://dl.dropboxusercontent.com/s/e1t2hhowjcrs7f5/100daysui_100icon.png" alt="Trophy" />
                <div class="modal-header"><span class="fs-2"style="margin-left: 100px;">Congratulations</span></div>
                <div class="modal-subheader text-muted text-center"><h5>You have successfully completed Admin Registration.</h5></div>
            </div>
            <div class="modal-bottom "style="margin-left: 100px;">
                <span class="fs-5">User Name :&nbsp;</span><span class="fs-5"><?php echo$FetchData['User_name']; ?></span>

            </div>
            <div class="modal-bottom" style="margin-left: 100px;">
                <span class="fs-5">Password &nbsp;&nbsp;&nbsp;:&nbsp;</span><span class="fs-5"><?php echo$FetchData['Password']; ?></span>
                <span class="fs-6 text-danger"><br>* keep it private and secure.</span>
            </div>
    
    </div>
    </div>
    <footer style="margin-top: 85px;"><?php include("footer.php"); ?></footer>
</body>

</html>