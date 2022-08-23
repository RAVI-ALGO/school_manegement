<?php
include("db_connection.php");
include("sessionFile.php");

if (isset($_REQUEST["upadateID"])) {
    $Row_update_id = $_REQUEST["upadateID"];
    $row_update_data = mysqli_query($connection, "SELECT*FROM student_registraion WHERE id='$Row_update_id'");
    $get_update_data = mysqli_fetch_array($row_update_data);
    // echo $get_update_data['gender'];

}
if (isset($_POST['updatebtn'])) {
    $update_id = $_POST['update_id'];
    //old image data
    $SelectQuery = mysqli_query($connection, "SELECT*FROM student_registraion");
    $Fetch_old_image_data = mysqli_fetch_array($SelectQuery);
    //old image data deleting

    //update data
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $fatherName = $_POST['FatherName'];
    $mothername = $_POST['MotherName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $mobileNo = $_POST['mobile'];
    //echo$mobileNo;
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

    //  student image Update
    $stuimg = $_FILES['stuimg']['name'];
    if ($stuimg) 
    {
       // echo "img";
        //delete old image
        $StuImageName = $Fetch_old_image_data['stuimg'];
        unlink("uploads/Stuimg/".$StuImageName);
        //upload new image
        $stuimgtmp = $_FILES['stuimg']['tmp_name'];
        $path = "uploads/stuimg/" . $stuimg;
        $uploadedimg = move_uploaded_file($stuimgtmp, $path);
        $updateQuery = mysqli_query($connection, "UPDATE student_registraion SET first_name='$firstName',last_name='$lastName',father_name='$fatherName',mother_name='$mothername',dob='$dob',gender='$gender',country='$country',state='$state',city='$city',address='$address',mobile='$mobileNo',landline='$landlineNo',schollar_no='$schollarNo',reg_no='$RegistrationNo',class='$class',mode='$mode',stream='$stream',section='$section',add_date='$AddDate',medium='$Medium',prev_school='$prevSchool',prev_class='$prevClass',category='$category',religion='$religion',M_tongue='$Mothertongue',resi_area='$ResidentalArea',occupation='$occupation',income='$annualIncome',vehicle='$vehicle',bus_no='$busNo',samgra='$samgra',bank='$bankname',bank_ac='$ACno',ifsc='$ifsc',addhar='$addhar',stuimg='$stuimg' WHERE id='$update_id'");
        if($updateQuery)
        {
            header("location:view_registration.php");
        }
        else
        {
            header("location:update_data.php");

        }
    }
    else
    {
      
        $updateQuery = mysqli_query($connection, "UPDATE student_registraion SET first_name='$firstName',last_name='$lastName',father_name='$fatherName',mother_name='$mothername',dob='$dob',gender='$gender',country='$country',state='$state',city='$city',address='$address',mobile='$mobileNo',landline='$landlineNo',schollar_no='$schollarNo',reg_no='$RegistrationNo',class='$class',mode='$mode',stream='$stream',section='$section',add_date='$AddDate',medium='$Medium',prev_school='$prevSchool',prev_class='$prevClass',category='$category',religion='$religion',M_tongue='$Mothertongue',resi_area='$ResidentalArea',occupation='$occupation',income='$annualIncome',vehicle='$vehicle',bus_no='$busNo',samgra='$samgra',bank='$bankname',bank_ac='$ACno',ifsc='$ifsc',addhar='$addhar' WHERE id='$update_id'");
        if($updateQuery)
        {
            header("location:view_registration.php");
        }
        else
        {
            header("location:update_data.php");
        }
    }

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
     <script>
 $(document).ready(function()
        {
            $(".van").hide();
            if($("input[name='vehicle']:checked").val()=="Yes")
            {
            $(".van").show();
        }
           else
                {           
                $(".van").hide();
                }
            $("#yesVan").click(function(){
            $(".van").show();
            });
           
            $("#noVan").click(function(){
                $(".van").hide();

            });
        });


        $(document).ready(function() {
      $("#Stdymode").hide();
      $("#Stdystream").hide();
      var Class = $("#classStu").val();
      if (Class == "10th" || Class == "12th" || Class == "11th") {
          $("#Stdymode").show();
      }
      if (Class == "11th" || Class == "12th") {
          $("#Stdystream").show();
      }
  });

    </script>
    <title>Update Student Data </title>
</head>

<body>
    <?php include "header.php"; ?>
    <nav class="navbar navbar-expand-lg navbar-dark fs-5 pt-2">
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
                        <a class="nav-link" href="teacher_reg.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    if (isset($_POST[''])) {
        if ($updateQuery) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>✅😃😃😃</strong>Student Data updated successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
        } else {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>❎😭😭😭</strong>Student data does not Updated successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
        }
    }
    ?>
    <div class="container ">
        <p class="text-light mt-3 bg-success fs-3 text-center">Update Student Data</p>
    </div>
    <hr>
    <div class="mb-5">
        <form method="POST" enctype="multipart/form-data" class="mx-auto">
            <div class="container Pdetails pb-4 pt-3" style="background-color: #E2C2B9;">

                <div class="row">
                    <div class="container">
                        <span class="fs-2 FormHeading mx-5">Personal Details - </span>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="fname" class="col-lg-4 fs-5 col-form-label ">First Name </label>
                        <input type="text" class="form-control text-capitalize" id="fname" placeholder="First name" aria-label="First name" name="fname" value="<?php echo $get_update_data['first_name']; ?>" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="lname" class="col-lg-4 fs-5 col-form-label ">Last Name </label>
                        <input type="text" class="form-control text-capitalize" id="lname" placeholder="Last name" aria-label="Last name" name="lname" value="<?php echo $get_update_data['last_name']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="FatherName" class="col-lg-5 fs-5 col-form-label ">Father's Name </label>
                        <input type="text" class="form-control text-capitalize" id="FatherName" placeholder=" Enter Father's name" aria-label="Father's name" name="FatherName" value="<?php echo $get_update_data['father_name']; ?>" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="motherN" class="col-5 fs-lg-5 col-form-label ">Mother's Name </label>
                        <input type="text" class="form-control text-capitalize" id="MotherName" placeholder=" Enter Mother's name" aria-label="mother name" name="MotherName" value="<?php echo $get_update_data['mother_name']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="dob" class="col-lg-3 fs-5 col-form-label ">D.O.B. </label>
                        <input type="date" class="form-control" id="dob" placeholder="First name" name="dob" value="<?php echo $get_update_data['dob']; ?>" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <br><label for="gender" class="col-lg-4 fs-5 col-form-label mt-2 ">Gender :-</label>
                        <input type="radio" class="" id="gender" name="gender" value="male" <?php if ($get_update_data['gender'] == "male") echo 'checked="checked"'; ?>>Male &nbsp; <input type="radio" class="" name="gender" value="female" <?php if ($get_update_data['gender'] == "female") echo 'checked="checked"'; ?> required>Female

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="country" class="col-lg-3 fs-5 col-form-label ">Country </label>
                        <input type="text" class="form-control text-capitalize" id="country" placeholder="Enter country" name="country" value="<?php echo $get_update_data['country']; ?>" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="state" class="col-lg-3 fs-5 col-form-label ">State </label>
                        <input type="text" class="form-control text-capitalize" id="state" placeholder="Enter state" name="state" value="<?php echo $get_update_data['state']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="fname" class="col-lg-3 fs-5 col-form-label ">City </label>
                        <input type="text" class="form-control text-capitalize" id="city" placeholder="Enter city" aria-label="city name" name="city" value="<?php echo $get_update_data['city']; ?>" required>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="address" class="col-lg-3 fs-5 col-form-label ">Address </label>
                        <input type="text" class="form-control text-capitalize" id="address" placeholder="Enter city" aria-label="Last name" name="address" value="<?php echo $get_update_data['address']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <label for="mobile" class="col-lg-3 fs-5 col-form-label ">Mobile </label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter Moble no" aria-label="city name" name="mobile" value="<?php echo $get_update_data['mobile']; ?>"required size="10" minlength='10' maxlength='10'>
                        <p class="text-danger fs-6"> * maximum 10 digits required</p>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <label for="landnile" class="col-lg-4 fs-5 col-form-label ">Landline No </label>
                        <input type="text" class="form-control" id="landline" placeholder="Enter landline no" aria-label="landline No" name="landnile" value="<?php echo $get_update_data['landline']; ?>"required size="8" minlength='8' maxlength='8'>
                        <p class="text-danger fs-6"> * maximum 8 digits required</p> 
                    </div>
                </div>
            </div>
    </div>
    <!-- Form Sectio2 -->
    <div class="container Academicdetails mt-5 pb-4 pt-2" style="background-color: #E2C2B9;">
        <div class="row">
            <div class="container">
                <span class="fs-2 FormHeading mx-5">Academic Details -</span>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="schollar" class="col-lg-4 fs-5 col-form-label  ">Schollar No. </label>
                <input type="text" class="form-control mt-1 " id="schollar" placeholder="Enter Schollar no." name="schollar" value="<?php echo $get_update_data['schollar_no']; ?>"  required size="5" minlength='1' maxlength='5'>
                <p class="text-danger fs-6"> * Minium 1 and maximum 5 digits required</p>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="regNo" class="col-lg-4 fs-5 col-form-label ">Reg. No. </label>
                <input type="text" class="form-control" id="regNo" placeholder="Enter Registration No." aria-label="Last name" name="regNo" value="<?php echo $get_update_data['reg_no']; ?>"required size="5" minlength='1' maxlength='5'>
                <p class="text-danger fs-6"> * Minium 1 and maximum 5 digits required</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <br>
                <label for="class" class="col-lg-3 fs-5 col-form-label d-inline">Class :- </label>
                <div class="form-floating d-inline ">
                    <?php
                    $classQuery = mysqli_query($connection, "SELECT*FROM class");
                    $classRowCount = mysqli_num_rows($classQuery);
                    ?>
                    <select class="class col-6 text-center" id="classStu" name="classStu" aria-label="class select">
                        <option value="">Select claas of student</option>
                        <?php
                        for ($i = 1; $i <= $classRowCount; $i++) {
                            $classData = mysqli_fetch_array($classQuery);

                        ?>
                            <option value="<?php echo $classData['class_name']; ?>" <?php if ($classData['class_name'] == $get_update_data['class']) echo "selected"; ?>><?php echo $classData['class_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div style="display:none;" id="Stdymode">
                    <label for="Mode" class="col-lg-3 fs-5 col-form-label d-inline mt-1 mr-5">Mode :- </label>
                    <input type="radio" class="mode" id="Mode" name="mode" value="Regular" <?php if ($get_update_data['mode'] == "Regular") echo 'checked="checked"'; ?>>Regular &nbsp; <input type="radio" class="mode" name="mode" value="Private" <?php if ($get_update_data['mode'] == "Private") echo 'checked="checked"'; ?>>Private
                </div>
                <div id="Stdystream" style="display:none;">
                    <label for="stream" class="col-lg-3 fs-5 col-form-label d-inline mt-1 mr-5">Stream :- </label>
                    <input type="radio" class="stream" id="stream" name="stream" value="Math" <?php if ($get_update_data['stream'] == "Math") echo 'checked="checked"'; ?>>Math &nbsp; <input type="radio" class="stream" name="stream" value="Biology" <?php if ($get_update_data['stream'] == "Biology") echo 'checked="checked"'; ?>>Biology&nbsp; <input type="radio" class="stream" name="stream" value="Arts" <?php if ($get_update_data['stream'] == "Arts") echo 'checked="checked"'; ?>>Arts&nbsp; <input type="radio" class="stream" name="stream" value="Comers" <?php if ($get_update_data['stream'] == "Comers") echo 'checked="checked"'; ?>>Comers
                </div>
            </div>

            <div class="col-md-5 mx-auto">
                <label for="section" class="col-lg-5 fs-5 col-form-label ">Section</label>
                <input type="text" class="form-control text-capitalize" id="section" placeholder="Enter student class section" name="section" aria-label="student class section" value="<?php echo $get_update_data['section'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="addDate" class="col-lg-5 fs-5 col-form-label ">Admission Date</label>
                <input type="date" class="form-control" id="addDate" placeholder="First name" name="addDate" value="<?php echo $get_update_data['add_date']; ?>" required>
            </div>
            <div class="col-md-5 mx-auto">
                <br><label for="medium" class="col-lg-3 fs-5 col-form-label mt-2 ">Medium :-</label>
                <input type="radio" name="medium" value="Hindi" <?php if ($get_update_data['medium'] == "Hindi") echo 'checked="checked"'; ?>>Hindi &nbsp; <input type="radio" name="medium" value="English" <?php if ($get_update_data['medium'] == "English") echo 'checked="checked"'; ?>>English
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="PrevSchool" class="col-lg-5 fs-5 col-form-label ">Previous School </label>
                <input type="text" class="form-control text-capitalize" id="PrevSchool" placeholder="Enter Student Previous school" name="PrevSchool" value="<?php echo $get_update_data['prev_school'] ?>" required>
            </div>
            <div class="col-md-5 mx-auto">
                <br>
                <label for="Prevclass" class="col-lg-5 fs-5 col-form-label d-inline mt-1">Previous Class :-</label>
                <div class="form-floating d-inline ">
                    <?php
                    $classQuery = mysqli_query($connection, "SELECT*FROM class");
                    $classRowCount = mysqli_num_rows($classQuery);
                    ?>
                    <select class="class col-5 text-center" id="Prevclass" name="Prevclass" aria-label="class select">
                        <option value="" required>Select Previous claas of student</option>
                        <?php
                        for ($i = 1; $i <= $classRowCount; $i++) {
                            $classData = mysqli_fetch_array($classQuery);

                        ?>
                            <option value="<?php echo $classData['class_name']; ?>" <?php if ($classData['class_name'] == $get_update_data['prev_class']) echo "selected"; ?>><?php echo $classData['class_name']; ?></option>
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
                <label for="category" class="col-lg-5 fs-5 col-form-label d-inline">Category :-</label>
                <div class="form-floating d-inline ">
                    <select class="class col-6 text-center" id="category" name="category" aria-label="class select">
                        <option value="" selected required>Select Category :-</option>
                        <option value="General" <?php if ($get_update_data['category'] == "General") echo "selected"; ?>>General</option>
                        <option value="O.B.C." <?php if ($get_update_data['category'] == "O.B.C.") echo "selected"; ?>>O.B.C.</option>
                        <option value="S.C./S.T." <?php if ($get_update_data['category'] == "O.B.C.") echo "S.C./S.T."; ?>>S.C./S.T.</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Religion" class="col-lg-5 fs-5 col-form-label ">Religion </label>
                <input type="text" class="form-control text-capitalize" id="Religion" placeholder="Enter Religion" aria-label="Last name" name="Religion" value="<?php echo $get_update_data['religion'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="mtongue" class="col-lg-5 fs-5 col-form-label ">Mother Tongue </label>
                <input type="text" class="form-control text-capitalize" id="mtongue" placeholder="Enter Mother tongue" aria-label="Mother tongue" name="mtongue" value="<?php echo $get_update_data['M_tongue'] ?>">
            </div>
            <div class="col-md-5 mx-auto">
                <label for="ResiArea" class="col-lg-4 fs-5 col-form-label mt-5">Residential Area :- </label>
                <input type="radio" class="" id="ResiArea" name="ResiArea" value="Rural" <?php if ($get_update_data['resi_area'] == "Rural") echo 'checked="checked"'; ?>>Rural &nbsp; <input type="radio" class="" name="ResiArea" value="Urban" <?php if ($get_update_data['resi_area'] == "Urban") echo 'checked="checked"'; ?>>Urban
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="Occupation" class="col-lg-5 fs-5 col-form-label ">Father Occupation </label>
                <input type="text" class="form-control" id="Occupation" placeholder="Enter Father's Occupation" aria-label="Mother tongue" name="Occupation" value="<?php echo $get_update_data['occupation']; ?>">
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Annual_Income" class="col-lg-4 fs-5 col-form-label mt-5">Annual Income :- </label>
                <input type="text" class="Annual_Income col-4 text-capitalize" id="Annual_Income" name="Annual_Income" placeholder="Enter Annul incone" value="<?php echo $get_update_data['income']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto my-auto">
                <label class="col-lg-3 form-check-label fs-5 mt-3" for="inlineCheckbox1">&nbsp;Van/Bus -</label>
                <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="vehicle" id="yesVan" value="Yes"<?php if ($get_update_data['vehicle'] == "Yes") echo 'checked="checked"'; ?> required>
                    <label class="form-check-label fs-5">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="vehicle" id="noVan" value="No" <?php if ($get_update_data['vehicle'] == "No") echo 'checked="checked"'; ?> required>
                    <label class="form-check-label fs-5" for="inlineCheckbox2">No</label>
                </div>
            </div>
            <div class="col-md-5 mx-auto my-auto van">
                <label class="col-lg-3 form-check-label fs-5 mt-2" for="BusNO">Van/Bus NO -</label>
                <input type="text" class="form-control" id="BusNO" placeholder="Enter Bus NO" aria-label="Bus NO" name="Bus_NO" required size="1" minlength='1' maxlength='1'>
            </div>
        </div>
    </div>
    <!-- section 3 -->
    <br><br>
    <div class="container section3 pb-4 pt-5" style="background-color: #E2C2B9;">
        <div class="row">
            <div class="container">
                <span class="fs-2 FormHeading mx-5">Bank Details :- </span>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="BankName" class="col-lg-3 fs-5 col-form-label ">Bank Name </label>
                <input type="text" class="form-control text-capitalize" id="BankName" placeholder="Bank name" aria-label="Bank name" name="BankName" value="<?php echo $get_update_data['bank']; ?>">
            </div>
            <div class="col-md-5 mx-auto">
                <label for="AcNo" class="col-lg-4 fs-5 col-form-label ">Bank Account No.</label>
                <input type="text" class="form-control" id="AcNo" placeholder="Enter Bank account No" aria-label="Enter Bank account No" name="AcNo" value="<?php echo $get_update_data['bank_ac']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="IFSC" class="col-lg-5 fs-5 col-form-label ">IFSC </label>
                <input type="text" class="form-control text-uppercase" id="IFSC" placeholder="Enter IFSC Code" aria-label="IFSC code" name="IFSC" value="<?php echo $get_update_data['ifsc']; ?>">
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Addhar" class="col-5 fs-5 col-form-label ">Addhar No. </label>
                <input type="text" class="form-control" id="Addhar" placeholder="Enter Addhar NO." aria-label="Addhar NO." name="addharno" value="<?php echo $get_update_data['addhar']; ?>"required size="12" minlength='12' maxlength='12'>
                <p class="text-danger fs-6"> * maximum 12 digits required</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <label for="Smagra" class="col-lg-5 fs-5 col-form-label ">Smagra Id </label>
                <input type="text" class="form-control" id="Smagra" placeholder="Enter Smagra Id" aria-label="IFSC code" name="Smagra" value="<?php echo $get_update_data['samgra']; ?>"required size="10" minlength='10' maxlength='10'>
                <p class="text-danger fs-6"> * maximum 10 digits required</p>
            </div>
            <div class="col-5 mx-auto">

            </div>
        </div>
    </div>
    <!-- section 4 -->
    <br>
    <br>
    <div class="container pb-3 section4" style="background-color: #E2C2B9;">
        <div class="row">
            <div class="container">
                <span class="fs-2 FormHeading mx-5">Upload Documents :- </span>
            </div>
            <div class="col-md-5 mx-auto">
                <div class="form-group">
                    <label for="stuimg" class="col-lg-4 fs-5 col-form-label ">Student image :- </label>
                    <input type="file" class="form-control-file" id="stuimg" name="stuimg">

                </div>
            </div>
           
        </div>
       
    </div>
    <br><br>
     <div class="container section4 pt-3 pb-3" style="background-color: #E2C2B9;">
        <center>
            <input type="text" name="update_id" value="<?php echo $get_update_data['id']; ?>" hidden>
            <input type="submit" class="btn btn-primary btn-lg" name="updatebtn" value="Update">
        </center>
    </div> 
    </form>
    </div>
    <br>
    <br>
    <br>
    <div class="pt-2 mt-3">
        <?php include("footer.php"); ?>
    </div>
</body>

</html>