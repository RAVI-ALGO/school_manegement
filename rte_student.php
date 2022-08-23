<?php
include("db_connection.php");
include("sessionFile.php");

$selectQuery = mysqli_query($connection, "SELECT * FROM student_registraion");
$RowCount=mysqli_num_rows($selectQuery);

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
    <title>RTE students data</title>
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
                        <a class="nav-link active" href="#">RTE</a>
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
    
<h4 class="fs-4 bg-info text-center">RTE student Record</h4>
    <div class="container-fluid">
    <form class="d-flex justify-content-center" action="rte_student_by_schollar_no.php" id="search_form">
  <div class="row">
    <div class="col-auto">
      <input type="text" class="form-control" name="schollar_no" id="schollar" placeholder="Enter Schollar NO">
    </div>
    <div class="col-auto">
      <input type="submit" class="form-control btn btn-primary" name="searchbtn" value="Search" >
    </div>
  </div>
</form>
<div class="container-fluid d-flex justify-content-center">
<span class="text-danger" id="msg" style="margin-right: 150px;"></span>

</div>
    </div>
    <div class="container-fluid mx-0 mt-4" style="height:356px; width:100%; overflow: scroll;">
            <table class="table table-hover" style="background-color: #dcdcdc; border:solid black 2px;">
                <thead>
                    <tr>
                        <th>Scholar No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Father's name</th>
                        <th>Mother's name</th>
                        <th>DOB</th>
                        <th>Class</th>
                        <th>Category</th>
                        <th>Aadhar</th>
                        <th>Smagra Id</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($selectQuery as $dob) {
                        $studob = $dob['dob'];
                        //echo  $dob['first_name'];
                        $today = date("Y-m-d");
                        $age = date_diff(date_create($studob), date_create($today));
                        $stuAge = $age->format('%y');
                        //echo$stuAge."<br>";
                         if ($stuAge >=6 && $stuAge <= 14) 
                        {

                             $viewQuery = mysqli_query($connection, "SELECT *FROM student_registraion WHERE dob='$studob'");
                             $fetch_data = mysqli_fetch_array($viewQuery);
                            // echo$fetch_data['first_name']."<br>";
                             $RowCount = mysqli_num_rows($viewQuery);
                            ?>

                         
                             <tr class="text-capitalize">
                                <td><?php echo $fetch_data["schollar_no"]; ?></td>
                                <td><?php echo $fetch_data["first_name"]; ?></td>
                                <td><?php echo $fetch_data["last_name"]; ?></td>
                                <td><?php echo $fetch_data["father_name"]; ?></td>
                                <td><?php echo $fetch_data["mother_name"]; ?></td>
                                <td><?php echo $fetch_data["dob"]; ?></td>
                                <td><?php echo $fetch_data["class"]; ?></td>
                                <td><?php echo $fetch_data["category"]; ?></td>
                                <td><?php echo $fetch_data["addhar"]; ?></td>
                                <td><?php echo $fetch_data["samgra"]; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
          
    <div class="d-flex fixed-bottom">
        <?php include("footer.php") ?>
    </div>
</body>

</html>