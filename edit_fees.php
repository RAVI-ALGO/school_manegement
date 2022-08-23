<?php
include("db_connection.php");
include("sessionFile.php");

if (isset($_REQUEST['upadateid'])) {
    $updateFeesId=$_REQUEST['upadateid'];
    //echo$updateFeesId;
    $selectQuery=mysqli_query($connection,"SELECT * FROM student_fees WHERE id='$updateFeesId'");
    $Fetch_data=mysqli_fetch_array($selectQuery);
    $full_fees = $Fetch_data['total_fees'];
    $oldTotalDeposit=$Fetch_data['total_deposit'];
    $oldRemainFees=$Fetch_data['fees_remain'];
    $oldAmount=$Fetch_data['last_transaction_amount'];
}

//insert fees record
if (isset($_POST['updatebtn'])) {
    $schNo = $_POST['schollar_no'];
    $stuname = $_POST['name'];
    $fathername = $_POST['fname'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $mobileNo = $_POST['mobile'];
    $paydate = $_POST['pay_date'];
    $total_fees = $_POST['totalfees'];
    $amount = $_POST['fess'];
    $x=$oldTotalDeposit-$oldAmount;
    $total_deposit = $x+ $amount;
    echo$total_deposit;
    $remainFees = $total_fees - $total_deposit;
    echo$remainFees;
    $updateQuery = mysqli_query($connection, "UPDATE student_fees SET total_deposit='$total_deposit',fees_remain='$remainFees',pay_date='$paydate',last_transaction_amount='$amount' WHERE id='$updateFeesId'");
    if ($updateQuery) {
        //header("location:student_fees_deposit_full_list.php");
        echo"updated";
    }
    else
    {
        echo"not updTE";
    }
    //$schNO=$_POST[''];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/coustom.js"></script>
    <title>Student Fees Deposit</title>
</head>

<body>
    <?php include("header.php"); ?>
    <nav class="navbar navbar-expand-lg navbar-dark fs-5 pt-2">
        <div class="container-fluid menu">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                            Registration
                        </a>
                        <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="add_stu_Reg.php">Add Registration</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="view_registration.php">View Registration</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search_sch_no.php">Search Schollar No</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Search_class.php">Search Class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="fees.php">Fees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rte_student.php">RTE</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Teachers
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="teacher_reg.php">Add Registration</a></li>
                            <li><a class="dropdown-item" href="view_teacher.php">View Registration</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Id Card</a>
                    </li>
                </ul>
            </div>
            <form method="POST" class="d-flex d-inline mx-2">
                    <div class="dropdown show fs-6">
                        <img src="images/loginuser.jpg" class="rounded-circle" style="height:40px ; width:40px;">
                        <a class="btn text-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $FetchData['User_name']; ?>
                        </a>

                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Change Password</a>
                            <input type="submit" class="dropdown-item" name="logoutbtn" value="Logout"></input>
                        </div>
                    </div>
                    <!-- <button class="btn btn-secondary btn-sm mx-2" type="submit">Logout</button> -->
                </form>
        </div>
    </nav>
    <h3 class="text-center bg-info">Update Fees Deposite Record</h3>
    <div class="container mt-4">
        <form method="POST">
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-5 fs-3 text-center text-light bg-success"><span>Total Fees- <?php echo $Fetch_data['total_fees']; ?></span>
                        <input type="text" name="totalfees" value="<?php echo $Fetch_data['total_fees']; ?>" hidden>
                    </div>
                    <div class="col-5 fs-3 text-center text-light bg-success"><span>Remaining Fees -<?php echo $oldRemainFees; ?></span>
                        <input type="text" name="Remainfess" value="<?php echo $oldRemainFees; ?>" hidden>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-2">
                    <h4 class="">Schollar No.</h4>
                </div>
                <div class="col-md-3"><input type="text" class="form-control" name="schollar_no" value="<?php echo $Fetch_data['schollar_no']; ?>" readonly></div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-2">
                    <h4>Name</h4>
                </div>
                <div class="col-md-3"><input type="text" class="form-control text-capitalize" name="name" value="<?php echo$Fetch_data['name']; ?>" readonly></div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-2">
                    <h4>Father's Name</h4>
                </div>
                <div class="col-md-3"><input type="text" class="form-control text-capitalize" name="fname" value="<?php echo $Fetch_data['father_name']; ?>" readonly></div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-2">
                    <h4>class</h4>
                </div>
                <div class="col-md-3"><input type="text" class="form-control" name="class" value="<?php echo $Fetch_data['class']; ?>" name="" readonly></div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-2">
                    <h4>Section</h4>
                </div>
                <div class="col-md-3"><input type="text" class="form-control text-capitalize" name="section" value="<?php echo $Fetch_data['section']; ?>" readonly></div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-2">
                    <h4>Mobile No.</h4>
                </div>
                <div class="col-md-3"><input type="text" class="form-control" name="mobile" value="<?php echo $Fetch_data['mobile']; ?>" readonly></div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-2">
                    <h4>Pay Date</h4>
                </div>
                <div class="col-md-3"><input type="date" class="form-control" name="pay_date" value="<?php echo$Fetch_data['pay_date']; ?>"required></div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-2">
                    <h4>Fees Amount</h4>
                </div>
                <div class="col-md-3"><input type="text" class="form-control" name="fess" value="<?php echo$Fetch_data['last_transaction_amount']; ?>" required></div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-2"></div>
                <div class="col-md-3"><input type="submit" class=" btn btn-primary" name="updatebtn" value="Update Fees"></div>
            </div>
    </div>
    </form>
    </div>
    <div class="mt-3">
        <?php include("footer.php"); ?>
    </div>
</body>

</html>