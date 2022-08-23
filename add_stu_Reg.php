<?php
include("db_connection.php");
include("sessionFile.php");
if (isset($_POST['submitbtn'])) {
    $schNo = $_POST['schollar'];
    //validation for avoide duplicate schollar no
    $selectQuery_old = mysqli_query($connection, "SELECT*FROM student_registraion WHERE schollar_no='$schNo'");
    $RowCount = mysqli_num_rows($selectQuery_old);
    if ($RowCount == 0) {
        // section1 entry
        $firstName = $_POST['fname'];
        $laststName = $_POST['lname'];
        $fatherName = $_POST['FatherName'];
        $mothername = $_POST['MotherName'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $mobileNo = $_POST['mobile'];
        $landlineNo = $_POST['landnile'];
        // section2 entry
        $schollarNo = $_POST['schollar'];
        $RegistrationNo = $_POST['regNo'];
        $class = $_POST['classStu'];
        if ($class == "10th" || $class == "11th" || $class == "12th") {
            $mode = $_POST['mode'];
        } else {
            $mode = "NA";
        }
        if ($class == "10th" || $class == "11th" || $class == "12th") {
            $stream = $_POST['stream'];
        } else {
            $stream = "NA";
        }
        $section = $_POST['section'];
        $AddDate = $_POST['addDate'];
        $Medium = $_POST['medium'];
        $prevSchool = $_POST['PrevSchool'];
        $prevClass = $_POST['Prevclass'];
        $category = $_POST['category'];
        $religion = $_POST['Religion'];
        $Mothertongue = $_POST['mtongue'];
        $ResidentalArea = $_POST['ResiArea'];
        $occupation = $_POST['Occupation'];
        $annualIncome = $_POST['Annual_Income'];
        $vehicle=$_POST['vehicle'];
        if($vehicle=="Yes")
        {
            $busNo=$_POST['Bus_NO'];

        }
        $bankname = $_POST['BankName'];
        $ACno = $_POST['AcNo'];
        $ifsc = $_POST['IFSC'];
        $addhar = $_POST['addharno'];
        $samgra = $_POST['Smagra'];
        //  student image Upload
        $stuimg = $_FILES['stuimg']['name'];
        $stuimgtmp = $_FILES['stuimg']['tmp_name'];
        $path = "uploads/stuimg/" . $stuimg;
        $uploadedimg = move_uploaded_file($stuimgtmp, $path);
        // Addhar card Upload
        $stuAddhar = $_FILES['addhar']['name'];
        $stuAddhartmp = $_FILES['addhar']['tmp_name'];
        $path = "uploads/Addharimg/" . $stuAddhar;
        $uploadedAddhar = move_uploaded_file($stuAddhartmp, $path);
        // BankPassbook Upload
        $passbook = $_FILES['bankPass']['name'];
        $passbooktmp = $_FILES['bankPass']['tmp_name'];
        $path = "uploads/bankPassbook/" . $passbook;
        $uploadPassbook = move_uploaded_file($passbooktmp, $path);
        //upload tc
        $tc = $_FILES['tc']['name'];
        $Tctmp = $_FILES['tc']['tmp_name'];
        $path = "uploads/tc/" . $tc;
        $uploadTc = move_uploaded_file($Tctmp, $path);
        //upload marksheet

        $stuMarksheet = $_FILES['marksheet']['name'];
        $marksheettmp = $_FILES['marksheet']['tmp_name'];
        $path = "uploads/marksheet/" . $stuMarksheet;
        $uploadMarksheet = move_uploaded_file($marksheettmp, $path);
        //Income Certificate
        $stuIncome = $_FILES['income']['name'];
        $Incometmp = $_FILES['income']['tmp_name'];
        $path = "uploads/IncomeCertificate/" . $stuIncome;
        $uploadIncome = move_uploaded_file($Incometmp, $path);
        $insertQuery = mysqli_query($connection, "INSERT INTO student_registraion(first_name,last_name,father_name,mother_name,dob,gender,country,state,city,address,mobile,landline,schollar_no,reg_no,class,mode,stream,section,add_date,medium,prev_school,prev_class,category,religion,M_tongue,resi_area,occupation,income,vehicle,bus_no,bank,bank_ac,ifsc,addhar,samgra,stuimg,addharimg,passbookimg,tcimg,marksheetimg,incomeimg)VALUES('$firstName','$laststName','$fatherName','$mothername','$dob','$gender','$country','$state','$city','$address','$mobileNo','$landlineNo','$schollarNo','$RegistrationNo','$class','$mode','$stream','$section','$AddDate','$Medium','$prevSchool','$prevClass','$category','$religion','$Mothertongue','$ResidentalArea','$occupation','$annualIncome','$vehicle','$busNo','$bankname','$ACno','$ifsc','$addhar','$samgra','$stuimg','$stuAddhar','$passbook','$tc','$stuMarksheet','$stuIncome')");
    } else {
        $msg = "Schollar no already registerd.";
    }
}
//$insertQuery = mysqli_query($connection, "SELECT*FROM class");
// $rowCount = mysqli_num_rows($classQuery);
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
    <script>
 $(document).ready(function()
        {
            $(".van").hide();
            $("#yesVan").click(function(){
            $(".van").show();
            });
           
            $("#noVan").click(function(){md-
                $(".van").hide();

            });
        });
    </script>
    <title> Student Registration </title>
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>
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
                        <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                            Registration
                        </a>
                        <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="add_stu_Reg.php">Add Registration</a></li>
                            <li><a class="dropdown-item" href="view_registration.php">View Registration</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="search_sch_no.php">Search Schollar No</a>
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
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Teachers
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="teacher_reg.php">Add Registration</a></li>
                            <li><a class="dropdown-item" href="view_teacher.php required">View Registration</a></li>
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
    if (isset($_POST['submitbtn'])) {
        if (!empty($insertQuery)) {
            if ($insertQuery) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>✅😃😃😃</strong>Student Registered successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
            } else {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>❎😭😭😭</strong>Student does not Registered successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
            }
        }
    }
    ?>
    <div class="container ">
        <p class="text-light mt-3 bg-success fs-3 text-center">Student Registration Form</p>
    </div>
    <hr>
    <div class="mb-5">
    <form method="POST" enctype="multipart/form-data" class="mx-auto">
            <div class="container Pdetails pb-4 pt-3" style="background-color: #E2C2B9;">

                <div class="row">
                    <div class="container">
                        <span class="fs-2 FormHeading mx-5">Personal Details :- </span>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="fname" class="col-lg-3 fs-5 col-form-label">First Name </label>
                        <input type="text" class="form-control text-capitalize" id="fname" placeholder="First name" aria-label="First name" name="fname" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="lname" class="col-lg-3 fs-5 col-form-label ">Last Name </label>
                        <input type="text" class="form-control text-capitalize" id="lname" placeholder="Last name" aria-label="Last name" name="lname" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="FatherName" class="col-lg- fs-5 col-form-label ">Father's Name </label>
                        <input type="text" class="form-control text-capitalize" id="FatherName" placeholder=" Enter Father's name" aria-label="Father's name" name="FatherName" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="motherN" class="col-lg-3 fs-5 col-form-label ">Mother's Name </label>
                        <input type="text" class="form-control text-capitalize" id="MotherName" placeholder=" Enter Mother's name" aria-label="mother name" name="MotherName" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="dob" class="col-3 fs-5 col-form-label ">D.O.B. </label>
                        <input type="date" class="form-control" id="dob" placeholder="First name" name="dob" required>
                    </div>
                    <div class="col-md-5 mx-auto">
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
                        <label for="country" class="col-3 fs-5 col-form-label ">Country </label>
                        <input type="text" class="form-control text-capitalize" id="country" placeholder="Enter country" name="country" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="state" class="col-3 fs-5 col-form-label ">State </label>
                        <input type="text" class="form-control text-capitalize" id="state" placeholder="Enter state" name="state" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="fname" class="col-3 fs-5 col-form-label ">City </label>
                        <input type="text" class="form-control text-capitalize" id="city" placeholder="Enter city" aria-label="city name" name="city" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="address" class="col-3 fs-5 col-form-label ">Address </label>
                        <input type="text" class="form-control text-capitalize" id="address" placeholder="Enter city" aria-label="Last name" name="address" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="mobile" class="col-3 fs-5 col-form-label ">Mobile </label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile no." aria-label="city name" name="mobile" required size="10" minlength='10' maxlength='10'>
                        <p class="text-danger fs-6"> * maximum 10 digits required</p>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="landnile" class="col-lg-3 fs-5 col-form-label ">Landline No </label>
                        <input type="text" class="form-control" id="landline" placeholder="Enter landline no" aria-label="landline No" name="landnile" required size="8" minlength='8' maxlength='8'>
                        <p class="text-danger fs-6"> * maximum 8 digits required</p>
                    </div>
                </div>
            </div>
    </div>
    <!-- Form Sectio2 -->
    <div class="container Academicdetails mt-5 pb-4 pt-3" style="background-color: #E2C2B9;">
        <div class="row">
            <div class="container">
                <span class="fs-2 FormHeading mx-5">Academic Details</span>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="schollar" class="col-lg-3 fs-5 col-form-label  ">Schollar No. </label>
                <input type="text" class="form-control mt-1 " id="schollar" placeholder="Enter Schollar no." name="schollar" required size="5" minlength='1' maxlength='5'>
                <p class="text-danger fs-6"> * Minium 1 and maximum 5 digits required</p>
                <p class="text-danger fs-5"><?php if (isset($msg)) {
                                                echo $msg;
                                            } ?></p>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="regNo" class="col-lg-3 fs-5 col-form-label ">Reg. No. </label>
                <input type="text" class="form-control" id="regNo" placeholder="Enter Registration No." aria-label="Last name" name="regNo" required size="5" minlength='1' maxlength='5'>
                <p class="text-danger fs-6"> * Minium 1 and maximum 5 digits required</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <br>
                <label for="class" class="col-5 fs-5 col-form-label d-inline">Class :- </label>
                <div class="form-floating d-inline ">
                    <?php
                    $classQuery = mysqli_query($connection, "SELECT*FROM class");
                    $classRowCount = mysqli_num_rows($classQuery);
                    ?>
                    <select class="class col-6 text-center" id="classStu" name="classStu" aria-label="class select" required>
                        <option value="">Select claas of student</option>
                        <?php
                        for ($i = 1; $i <= $classRowCount; $i++) {
                            $classData = mysqli_fetch_array($classQuery);

                        ?>
                            <option value="<?php echo $classData['class_name']; ?>"><?php echo $classData['class_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div style="display:none;" id="Stdymode">
                    <label for="Mode" class="col-5 fs-5 col-form-label d-inline mt-1 mr-5">Mode :- </label>
                    <input type="radio" class="mode" id="Mode" name="mode" value="Regular">Regular &nbsp; <input type="radio" class="mode" name="mode" value="Private">Private
                </div>
                <div id="Stdystream" style="display:none;">
                    <label for="stream" class="col-5 fs-5 col-form-label d-inline mt-1 mr-5">Stream :- </label>
                    <input type="radio" class="stream" id="stream" name="stream" value="Math">Math &nbsp; <input type="radio" class="stream" name="stream" value="Biology">Biology&nbsp; <input type="radio" class="stream" name="stream" value="Arts">Arts&nbsp; <input type="radio" class="stream" name="stream" value="Comers">Comers
                </div>
            </div>

            <div class="col-md-5 mx-auto">
                <label for="section" class="col-5 fs-5 col-form-label ">Section</label>
                <input type="text" class="form-control text-capitalize" id="section" placeholder="Enter student class section" name="section" aria-label="student class section" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="addDate" class="col-lg- fs-5 col-form-label ">Admission Date</label>
                <input type="date" class="form-control" id="addDate" placeholder="First name" name="addDate">
            </div>
            <div class="col-md-5 mx-auto">
                <br><label for="medium" class="col-lg-2 fs-5 col-form-label mt-2 ">Medium :-</label>
                <input type="radio" name="medium" value="Hindi" required>Hindi &nbsp; <input type="radio" name="medium" value="English" required>English
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="PrevSchool" class="col-lg-3 fs-5 col-form-label ">Previous School </label>
                <input type="text" class="form-control text-capitalize" id="PrevSchool" placeholder="Enter Student Previous school" name="PrevSchool">
            </div>
            <div class="col-md-5 mx-auto">
                <br>
                <label for="Prevclass" class="col-lg-3 fs-5 col-form-label d-inline mt-1">Previous Class :-</label>
                <div class="form-floating d-inline ">
                    <?php
                    $classQuery = mysqli_query($connection, "SELECT*FROM class");
                    $classRowCount = mysqli_num_rows($classQuery);
                    ?>
                    <select class="class col-lg-5 text-center" id="Prevclass" name="Prevclass" aria-label="class select" required>
                        <option value="">Select Previous claas of student</option>
                        <?php
                        for ($i = 1; $i <= $classRowCount; $i++) {
                            $classData = mysqli_fetch_array($classQuery);
                        ?>
                            <option value="<?php echo $classData['class_name']; ?>"><?php echo $classData['class_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <br>
                <label for="category" class="col-lg-2 fs-5 col-form-label d-inline">Category :-</label>
                <div class="form-floating d-inline ">
                    <select class="class col-6 text-center" id="category" name="category" aria-label="class select" required required>
                        <option value="" selected>Select Category :-</option>
                        <option value="General">General</option>
                        <option value="O.B.C.">O.B.C.</option>
                        <option value="S.C./S.T.">S.C./S.T.</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Religion" class="col-lg-5 fs-5 col-form-label ">Religion </label>
                <input type="text" class="form-control text-capitalize" id="Religion" placeholder="Enter Religion" aria-label="Last name" name="Religion" required required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="mtongue" class="col-lg-5 fs-5 col-form-label ">Mother Tongue </label>
                <input type="text" class="form-control text-capitalize" id="mtongue" placeholder="Enter Mother tongue" aria-label="Mother tongue" name="mtongue" required required>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="ResiArea" class="col-lg-4 fs-5 col-form-label mt-5">Residential Area :- </label>
                <input type="radio" class="" id="ResiArea" name="ResiArea" value="Rural" required required>Rural &nbsp; <input type="radio" class="" name="ResiArea" value="Urban" required required>Urban
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="Occupation" class="col-lg-5 fs-5 col-form-label ">Father Occupation </label>
                <input type="text" class="form-control text-capitalize" id="Occupation" placeholder="Enter Father's Occupation" aria-label="Mother tongue" name="Occupation" required>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Annual_Income" class="col-lg-4 fs-5 col-form-label mt-5">Annual Income :- </label>
                <input type="text" class="Annual_Income col-4" id="Annual_Income" name="Annual_Income" placeholder="Enter Annul incone" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto my-auto">
                <label class="col-lg-3 form-check-label fs-5 mt-3" for="inlineCheckbox1">&nbsp;Van/Bus -</label>
                <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="vehicle" id="yesVan" value="Yes" required>
                    <label class="form-check-label fs-5">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="vehicle" id="noVan" value="No" required>
                    <label class="form-check-label fs-5" for="inlineCheckbox2">No</label>
                </div>
            </div>
            <div class="col-md-5 mx-auto van">
                <label class="col-lg-3 form-check-label fs-5 mt-2" for="BusNO">Van/Bus NO -</label>
                <input type="text" class=" form-control" id="BusNO" placeholder="Enter Bus NO" aria-label="Bus NO" name="Bus_NO" required size="1" minlength='1' maxlength='1'>
            </div>
        </div>
        
    </div>
        <!-- section 3 -->
        <br><br>
        <div class="container pb-4 pt-5 " style="background-color: #E2C2B9; border-radius: 10px;">
            <div class="row">
                <div class="container">
                    <span class="fs-2 FormHeading mx-5">Bank Details :- </span>
                </div>
                <div class="col-md-5 mx-auto">
                    <label for="BankName" class="col-lg-3 fs-5 col-form-label ">Bank Name </label>
                    <input type="text" class="form-control text-capitalize" id="BankName" placeholder="Bank name" aria-label="Bank name" name="BankName" required>
                </div>
                <div class="col-md-5 mx-auto">
                    <label for="AcNo" class="col-lg-4 fs-5 col-form-label ">Bank Account No.</label>
                    <input type="text" class="form-control" id="AcNo" placeholder="Enter Bank account No" aria-label="Enter Bank account No" name="AcNo" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <label for="IFSC" class="col-lg-3 fs-5 col-form-label ">IFSC </label>
                    <input type="text" class="form-control text-uppercase" id="IFSC" placeholder="Enter IFSC Code" aria-label="IFSC code" name="IFSC" required>
                </div>
                <div class="col-md-5 mx-auto">
                    <label for="Addhar" class="col-lg-3 fs-5 col-form-label ">Addhar No. </label>
                    <input type="text" class="form-control" id="Addhar" placeholder="Enter Addhar NO." aria-label="Addhar NO." name="addharno" required size="12" minlength='12' maxlength='12'>
                    <p class="text-danger fs-6"> * maximum 12 digits required</p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <label for="Smagra" class="col-lg-3 fs-5 col-form-label ">Smagra Id </label>
                    <input type="text" class="form-control" id="Smagra" placeholder="Enter Smagra Id" aria-label="IFSC code" name="Smagra" required size="10" minlength='10' maxlength='10'>
                    <p class="text-danger fs-6"> * maximum 10 digits required</p>
                </div>
                <div class="col-md-5 mx-auto">

                </div>
            </div>
        </div>
        <!-- section 4 -->
        <br>
        <br>
        <div class="container pb-4 pt-5 section4" style="background-color: #E2C2B9;    border-radius: 10px;">
            <div class="row">
                <div class="container">
                    <span class="fs-2 FormHeading mx-5">Upload Documents :- </span>
                </div>
                <div class="col-md-5 mx-auto">
                    <div class="form-group">
                        <label for="stuimg" class="col-lg-4 fs-5 col-form-label ">Student image :- </label>
                        <input type="file" class="form-control-file" id="stuimg" name="stuimg" required>
                    </div>
                </div>
                <div class="col-md-5 mx-auto">
                    <div class="form-group">
                        <label for="addhar" class="col-lg-4 fs-5 col-form-label ">Addhar image :- </label>
                        <input type="file" class="form-control-file" id="addhar" name="addhar">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="form-group">
                        <label for="bankPass" class="col-lg-4 fs-5 col-form-label ">Bank Passbook :- </label>
                        <input type="file" class="form-control-file" id="bankPass" name="bankPass">
                    </div>
                </div>
                <div class="col-md-5 mx-auto">
                    <div class="form-group">
                        <label for="tc" class="col-lg-4 fs-5 col-form-label ">Upload TC :- </label>
                        <input type="file" class="form-control-file" id="tc" name="tc">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="form-group">
                        <label for="marksheet" class="col-lg-4 fs-5 col-form-label ">Last Year Marksheet </label>
                        <input type="file" class="form-control-file" id="marksheet" name="marksheet">
                    </div>
                </div>
                <div class="col-md-5 mx-auto">
                    <div class="form-group">
                        <label for="income" class="col-lg-6 fs-5 col-form-label ">Upload Income Certificate </label>
                        <input type="file" class="form-control-file" id="income" name="income">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container pt-3 pb-3" style="background-color: #E2C2B9; border-radius: 10px;">
            <center>
                <input type="submit" class="btn btn-primary btn-lg" name="submitbtn" value="Submit">
                <button type="reset" class="btn btn-success btn-lg">Reset</button>
            </center>
        </div>
        </form>
    </div>
    <div class="pt-5 mt-5">
        <?php include("footer.php"); ?>
    </div>
</body>

</html>