<?php
include("db_connection.php");
include("sessionFile.php");

if(isset($_POST['submitbtn']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $FH_name=$_POST['FHName'];
    $mother=$_POST['MotherName'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $bank_AC=$_POST['AcNo'];
    $ifsc=$_POST['IFSC'];
    $addhar=$_POST['addharno'];
    $mobile=$_POST['mobile'];
    $qualification=$_POST['qualification'];
    $experience=$_POST['experience'];
    $shift=$_POST['shift'];
    $empId=$_POST['eid'];
    $empImg=$_FILES['Empimg']['name'];
    $Testquery=mysqli_query($connection,"SELECT* FROM teacher_reg WHERE empid='$empId'");
    $row_count=mysqli_num_rows($Testquery);
    if($row_count==0)
    {
        $empImgTmp=$_FILES['Empimg']['tmp_name'];
        $path = "uploads/Employee_img/" . $empImg;
        $uploadEmpImg = move_uploaded_file($empImgTmp, $path);
        $insertQuery=mysqli_query($connection," INSERT INTO teacher_reg(first_name,last_name,fORh_name,mother_name,dob,gender,country,state,city,address,bank_ac,ifsc,addhar,mobile,qualification,experience,shift_time,empid,empimg)VALUES('$fname','$lname','$FH_name','$mother','$dob','$gender','$country','$state','$city','$address','$bank_AC','$ifsc','$addhar','$mobile','$qualification','$experience','$shift','$empId','$empImg')");
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Teacher Registration</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/coustom.js"></script>
</head>

<body>
    <?php include("header.php") ?>
    <nav class="navbar navbar-expand-lg navbar-dark fs-5 pt-2" style="position: sticky;top: 0px;   z-index: 999;">
        <div class="container-fluid menu">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                            Registration
                        </a>
                        <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="add_stu_Reg.php">Add Registration</a></li>
                            <li><a class="dropdown-item" href="view_registration.php">View Registration</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search_sch_no.php">Search Schollar No</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Search_class.php">Search Class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fees.php">Fees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rte_student.php">RTE</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <?php
    if(!empty($row_count))
    {
        if($row_count>0)
        {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>❎😭😭😭</strong>Employee Already Registered ,Try with Another Employee ID.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }
    }
    if(!empty($insertQuery))
    {
       if($insertQuery)
       {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>✅😃😃😃</strong>Employee Registered successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
       }
    }
    ?>
    <div class="container">
        <p class="text-light mt-3 bg-warning fs-3 text-center">Employee Registration Form</p>
    </div>
    <div class="mb-5">
        <form method="POST" enctype="multipart/form-data" class="mx-auto">
            <div class="container Pdetails pb-4 pt-3  border border-success" style="background-color: #CFF6CF;">
                <div class="row ">
                    <div class="col-md-5 mx-auto">
                        <label for="fname" class="col-lg-5 fs-5 col-form-label">First Name </label>
                        <input type="text" class="form-control text-capitalize" id="fname" placeholder="First name" aria-label="First name" name="fname" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="lname" class="col-lg-3 fs-5 col-form-label ">Last Name </label>
                        <input type="text" class="form-control text-capitalize" id="lname" placeholder="Last name" aria-label="Last name" name="lname" required>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="FatherName" class="col-lg-6 fs-5 col-form-label ">Father's / Husband Name</label>
                        <input type="text" class="form-control text-capitalize" id="FatherName" placeholder=" Enter Father's name" aria-label="Father's name" name="FHName" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="motherN" class="col-lg-5 fs-5 col-form-label ">Mother's Name </label>
                        <input type="text" class="form-control text-capitalize" id="MotherName" placeholder=" Enter Mother's name" aria-label="mother name" name="MotherName" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="dob" class="col-md-3 fs-5 col-form-label ">D.O.B. </label>
                        <input type="date" class="form-control" id="dob" placeholder="First name" name="dob" required>
                    </div>
                    <div class="col-md-5 mx-auto my-auto">
                        <label class="form-check-label fs-5 mt-3" for="inlineCheckbox1">Gender -</label>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="gender" value="Male" required>
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Female" required>
                            <label class="form-check-label" for="inlineCheckbox2">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="country" class="col-md-3 fs-5 col-form-label ">Country </label>
                        <input type="text" class="form-control text-capitalize" id="country" placeholder="Enter country" name="country"required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="state" class="col-md-3 fs-5 col-form-label ">State </label>
                        <input type="text" class="form-control text-capitalize" id="state" placeholder="Enter state" name="state"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="fname" class="col-md-3 fs-5 col-form-label ">City </label>
                        <input type="text" class="form-control text-capitalize" id="city" placeholder="Enter city" aria-label="city name" name="city"required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="address" class="col-md-3 fs-5 col-form-label ">Address </label>
                        <input type="text" class="form-control text-capitalize" id="address" placeholder="Enter city" aria-label="Last name" name="address"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="AcNo" class="col-lg-6 fs-5 col-form-label ">Bank Account No.</label>
                        <input type="text" class="form-control" id="AcNo" placeholder="Enter Bank account No" aria-label="Enter Bank account No" name="AcNo" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="IFSC" class="col-md-3 fs-5 col-form-label ">IFSC </label>
                        <input type="text" class="form-control text-uppercase" id="IFSC" placeholder="Enter IFSC Code" aria-label="IFSC code" name="IFSC" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="Addhar" class="col-lg-6 fs-5 col-form-label ">Addhar No. </label>
                        <input type="text" class="form-control" id="Addhar" placeholder="Enter Addhar NO." aria-label="Addhar NO." name="addharno" required size="12" minlength='12' maxlength='12'>
                        <p class="text-danger fs-6"> * maximum 12 digits </p>

                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="mobile" class="col-md-3 fs-5 col-form-label ">Mobile </label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile no." aria-label="city name" name="mobile" required size="10" minlength='10' maxlength='10'>
                        <p class="text-danger fs-6"> * maximum 10 digits </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="" class="col-md-3 fs-5 col-form-label ">Qualification </label>
                        <select class="form-select" aria-label="Default select example" name="qualification" required>
                            <option selected>Select Qualification</option>
                            <opt.i.on value="B.E.">B.E.</opt.i.on>
                            <option value="B.Tech">B.Tech.</option>
                            <o.p.tion value="B.A.">B.A.</o.p.tion>
                            <option value="B.Sc.">B.Sc.</option>
                            <option value="B.B.A.>">B.B.A.</option>
                            <option value="M.E.">M.E.</option>
                            <option value="M.Tech">M.Tech.</option>
                            <option value="M.A.">M.A.</option>
                            <option value="M.Sc.">M.Sc.</option>
                            <option value="M.B.A.">M.B.A.</option>              
                            </select>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="" class="col-md-3 fs-5 col-form-label ">Experience </label>
                        <select class="form-select" aria-label="Default select example" name="experience" required>
                            <option selected>Select Experiensed</option>
                            <option value="Fresher">Fresher</option>
                            <option value="Experiensed">Experiensed</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="" class="col-lg-6 fs-5 col-form-label ">Shift Time </label>
                        <select class="form-select" aria-label="Default select example" name="shift" required>
                            <option selected>Select Shift</option>
                            <option value="Morning">Morning</option>
                            <option value="Afternoon">Afternoon</option>
                        </select>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="eid" class="col-lg-5 fs-5 col-form-label ">Empolyee Id </label>
                        <input type="text" class="form-control" id="eid" placeholder="Enter employee id" aria-label="employee id" name="eid" required size="8" minlength='5' maxlength='8'>
                        <p class="text-danger fs-6"> *minimum 5 and maximum 8 digits </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-md-5">
                        <div class="form-group">
                            <label for="Empimg" class="col-lg-6 fs-5 col-form-label ">Employee image :- </label>
                            <input type="file" class="form-control-file" id="Empimg" name="Empimg" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <center><input type="submit" class="btn btn-primary btn-lg" name="submitbtn" value="Submit"></center>
                </div>
            </div>
        </form>
    </div>
    <div class="">
        <?php include("footer.php") ?>
    </div>
</body>

</html>