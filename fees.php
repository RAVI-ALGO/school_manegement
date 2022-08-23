<?php 
include("db_connection.php");
include("sessionFile.php");

if(isset($_POST['searchbtn']))
{   $x=0;
    $schNo=$_POST['schollar_no'];
    $searchQuery=mysqli_query($connection,"SELECT * FROM student_registraion WHERE schollar_no='$schNo'");
    $Row_count=mysqli_num_rows($searchQuery);
    if($Row_count==0)
    {
        $msg="Incorrect Schollar no.";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/coustom.js"></script>
    <title>Student Fee</title>
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
                        <a class="nav-link active" href="#">Fees</a>
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
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-6 mx-1 my-1">
                <a href="student_fees_deposit_full_list.php" class=" btn btn-primary">View list</a>
                <a href="fees_by_class.php" class="btn btn-primary my-1">Fess by class</a>
                <a href="fees_by_schollarNo.php" class="btn btn-primary ">Fess by Schollar No</a>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form method="POST" action="student_fees_deposit.php" id="search_form" enctype="multipart/form-data" class=" col-10 justify-content-center d-flex mt-2">
            <div class="row mt-2 mx-2">
                <div class="col-md-4 g-1">
                    <label for="search_SCH_no" class="fs-5  form-label jystify-content-end">Schollar No</label>
                </div>
                <div class="col-md-7 g-1">
                    <input class="form-control" type="search" id="schollar" placeholder="Enter Schollar No." aria-label="Search" id="search_SCH_no" name="schollar_no">
                    <h6 class="text-danger text-center text fs-5 " id="msg" ></h6>
                    <center><span class="text-danger text fs-5 " ><?php if(isset($msg)){echo$msg;} ?></span></center>
                </div>
                <div class="col-md-1 g-1">
                    <input class="btn btn-success" type="submit" name="searchbtn" value="Search">
                </div>
            </div>
    </div>
    </form>
    
    <div class="fixed-bottom">
        <?php include("footer.php"); ?>
    </div>
</body>

</html>