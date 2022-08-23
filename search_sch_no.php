<?php
include("db_connection.php");
include("sessionFile.php");

if (isset($_POST['searchbtn'])) {
    if (isset($_REQUEST["deleteID"])) {
        $Row_Delete_id = $_REQUEST["deleteID"];
        $row_image_data = mysqli_query($connection, "SELECT*FROM student_registraion WHERE id='$Row_Delete_id'");
        $Fetch_image_data = mysqli_fetch_array($row_image_data);
        //Student Image delete
        $StuImageName = $Fetch_image_data["stuimg"];
        unlink("uploads/Stuimg/" . $StuImageName);
        //Addhar Image delete
        $AddharImageName = $Fetch_image_data["addharimg"];
        unlink("uploads/Addharimg/" . $AddharImageName);
        //Passbook Image delete
        $PassbookImageName = $Fetch_image_data["passbookimg"];
        unlink("uploads/bankPassbook/" . $PassbookImageName);
        //Tc Image delete
        $TcImageName = $Fetch_image_data["tcimg"];
        unlink("uploads/tc/" . $TcImageName);
        //Marksheet Image delete
        $MarksheetImageName = $Fetch_image_data["marksheetimg"];
        unlink("uploads/marksheet/" . $MarksheetImageName);
        //income Image delete
        $IncomeImageName = $Fetch_image_data["incomeimg"];
        unlink("uploads/IncomeCertificate/" . $IncomeImageName);

        $DeleteQuery = mysqli_query($connection, "DELETE FROM student_registraion WHERE id='$Row_Delete_id'");
    }
    $schNo = $_POST['schollar_no'];
    // echo $schNo;
    $select_query = mysqli_query($connection, "SELECT*FROM student_registraion WHERE schollar_no='$schNo'");
    $RowCount = mysqli_num_rows($select_query);
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
    <title>Secrch data by schollar NO</title>
</head>

<body>
    <?php include "header.php" ?>
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
                        <a class="nav-link active" href="search_sch_no.php">Search Schollar No</a>
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
    if (isset($_REQUEST["deleteID"])) {
        if ($DeleteQuery) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>✅😃😃😃</strong>Student Data deleted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
        } else {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>❎😭😭😭</strong>Student Data  does not deleted successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
        }
    }
    if (!empty($RowCount)) {

        if ($RowCount > 0) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>✅😃😃😃</strong>Student Record Found successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
        }
    }
    if (isset($RowCount)) {
        if (empty($RowCount)) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>❎😭😭😭</strong>No Record Found.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
        }
    }

    ?>

    <div class="container-fluid">
        <form method="POST" id="search_form" enctype="multipart/form-data" class=" col-10 justify-content-center d-flex mt-2">
           <div class="row">
           <div class="col-md-4 g-1">
                <label for="search_SCH_no" class="fs-5  form-label jystify-content-end">Search Student </label>
            </div>
            <div class="col-md-7 g-1">
                <input class="form-control" type="search" id="schollar" placeholder="Search Student by Schollar No." aria-label="Search" id="search_SCH_no" name="schollar_no">
            </div>
            <div class="col-md-1 g-1">
                <input class="btn btn-success" type="submit" name="searchbtn" value="Search">
            </div>
           </div>
        </form>
        <center><span class="text-danger text fs-5 " id="msg"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>

    </div>
    <?php
    if (!empty($RowCount)) {
        if ($RowCount > 0) {
    ?>
            <div class="container-fluid mt-5 mx-auto" style="overflow-x: auto; padding-bottom: 150px; margin-left:100px;">
                <table class="table table-hover" style="background-color: #dcdcdc; border:solid black 2px;">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Father's name</th>
                            <th>Mother's name</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Mobile No</th>
                            <th>Landline No</th>
                            <th>Scholar No</th>
                            <th>Registration No</th>
                            <th>Class</th>
                            <th>Mode</th>
                            <th>Stream</th>
                            <th>Section</th>
                            <th>Admission Date</th>
                            <th>Medium</th>
                            <th>Previous School</th>
                            <th>Previous Class</th>
                            <th>Category</th>
                            <th>Religion</th>
                            <th>Mother Tongue</th>
                            <th>Resi Area</th>
                            <th>Occupation</th>
                            <th>Income</th>
                            <th>Bank</th>
                            <th>Bank Ac.</th>
                            <th>Ifsc</th>
                            <th>Aadhar</th>
                            <th>Smagra Id</th>
                            <th>Student Image</th>
                            <th>Aadhar Image</th>
                            <th>Passbook Image</th>
                            <th>Tc Image</th>
                            <th>Marksheet Image</th>
                            <th>Income Image</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <?php
                    for ($i = 1; $i <= $RowCount; $i++) {
                        $fetch_data = mysqli_fetch_array($select_query);
                    ?>
                        <tr class="text-capitalize">
                            <td><?php echo $fetch_data["id"]; ?></td>
                            <td><?php echo $fetch_data["first_name"]; ?></td>
                            <td><?php echo $fetch_data["last_name"]; ?></td>
                            <td><?php echo $fetch_data["father_name"]; ?></td>
                            <td><?php echo $fetch_data["mother_name"]; ?></td>
                            <td><?php echo $fetch_data["dob"]; ?></td>
                            <td><?php echo $fetch_data["gender"]; ?></td>
                            <td><?php echo $fetch_data["country"]; ?></td>
                            <td><?php echo $fetch_data["state"]; ?></td>
                            <td><?php echo $fetch_data["city"]; ?></td>
                            <td><?php echo $fetch_data["address"]; ?></td>
                            <td><?php echo $fetch_data["mobile"]; ?></td>
                            <td><?php echo $fetch_data["landline"]; ?></td>
                            <td><?php echo $fetch_data["schollar_no"]; ?></td>
                            <td><?php echo $fetch_data["reg_no"]; ?></td>
                            <td><?php echo $fetch_data["class"]; ?></td>
                            <td><?php echo $fetch_data["mode"]; ?></td>
                            <td><?php echo $fetch_data["stream"]; ?></td>
                            <td><?php echo $fetch_data["section"]; ?></td>
                            <td><?php echo $fetch_data["add_date"]; ?></td>
                            <td><?php echo $fetch_data["medium"]; ?></td>
                            <td><?php echo $fetch_data["prev_school"]; ?></td>
                            <td><?php echo $fetch_data["prev_class"]; ?></td>
                            <td><?php echo $fetch_data["category"]; ?></td>
                            <td><?php echo $fetch_data["religion"]; ?></td>
                            <td><?php echo $fetch_data["M_tongue"]; ?></td>
                            <td><?php echo $fetch_data["resi_area"]; ?></td>
                            <td><?php echo $fetch_data["occupation"]; ?></td>
                            <td><?php echo $fetch_data["income"]; ?></td>
                            <td><?php echo $fetch_data["bank"]; ?></td>
                            <td><?php echo $fetch_data["bank_ac"]; ?></td>
                            <td><?php echo $fetch_data["ifsc"]; ?></td>
                            <td><?php echo $fetch_data["addhar"]; ?></td>
                            <td><?php echo $fetch_data["samgra"]; ?></td>
                            <td>
                                <img class="rounded" src="<?php echo "uploads/Stuimg/" . $fetch_data["stuimg"]; ?>" alt="Student image" height="100px" width="100px">

                            </td>
                            <td>
                                <img class="rounded" src="<?php echo "uploads/Addharimg/" . $fetch_data["addharimg"]; ?>" alt="Addhar image" height="100px" width="100px">
                            </td>
                            <td>
                                <img class="rounded" src="<?php echo "uploads/bankPassbook/" . $fetch_data["passbookimg"]; ?>" alt="Passbook" height="100px" width="100px">
                            </td>
                            <td>
                                <img class="rounded" src="<?php echo "uploads/tc/" . $fetch_data["tcimg"]; ?>" alt="TC" height="100px" width="100px">
                            </td>
                            <td>
                                <img class="rounded" src="<?php echo "uploads/marksheet/" . $fetch_data["marksheetimg"]; ?>" alt="Marksheet" height="100px" width="100px">
                            </td>
                            <td>
                                <img class="rounded" src="<?php echo "uploads/IncomeCertificate/" . $fetch_data["incomeimg"]; ?>" alt="Income" height="100px" width="100px">
                            </td>
                            <td><a class="delete_btn btn btn-danger my-3" href="view_registration.php ?deleteID=<?php echo $fetch_data["id"]; ?>">Delete</a></td>
                            <td><a class="edit_btn btn btn-success my-3" href="update_data.php ? upadateID=<?php echo $fetch_data["id"]; ?>">Edit</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
    <?php
        }
    }
    ?>
    <div class="fixed-bottom">
        <?php include "footer.php"; ?>

    </div>
</body>

</html>