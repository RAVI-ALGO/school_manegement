<?php 
include("db_connection.php");
include("sessionFile.php");

if(isset($_REQUEST['deleteID']))
{
    $deleteid=$_REQUEST['deleteID'];
    $deleteQuery=mysqli_query($connection,"DELETE FROM student_fees WHERE id='$deleteid'");
}
$selectQuery=mysqli_query($connection,"SELECT * FROM student_fees");
$Row_count=mysqli_num_rows($selectQuery);

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
    <title>Student fees deposit full list</title>
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
    <?php 
    if(!empty($Row_count))
    {
        ?>
<div class="container-fluid" style="height:446px; width:100%; overflow: scroll;">	
<table  class="table table-hover mx-0" style="background-color: #dcdcdc	;" border="1px" cellpadding="10" cellspacing="0">
        <thead class="">
            <th>Schollar no.</th>
            <th>Name</th>
            <th>Father's name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Mobile</th>
            <th>Total Fees</th>
            <th>Total Fees Pay</th>
            <th>Total Remaining Fees</th>
            <th>Pay Date</th>
            <th>Last Deposit</th>
            <th>Print Receipt</th>
            <th colspan="2"class="text-center">Actions</th>
        </thead>
        <?php
        for($i=1;$i<=$Row_count;$i++)
        {
            $fetch_data=mysqli_fetch_array($selectQuery);
            ?>
             <tr>
                <td><?php echo $fetch_data["schollar_no"]; ?></td>
                <td><?php echo $fetch_data["name"]; ?></td>
                <td><?php echo $fetch_data["father_name"]; ?></td>
                <td><?php echo $fetch_data["class"]; ?></td>
                <td><?php echo $fetch_data["section"]; ?></td>
                <td><?php echo $fetch_data["mobile"]; ?></td>
                <td><?php echo $fetch_data["total_fees"]; ?></td>
                <td><?php echo $fetch_data["total_deposit"]; ?></td>
                <td><?php echo $fetch_data["fees_remain"]; ?></td>
                <td><?php echo $fetch_data["pay_date"]; ?></td>
                <td><?php echo $fetch_data["last_transaction_amount"]; ?></td>
                <td><a class="btn btn-primary my-3" href="fees_receipt.php ? printID=<?php echo $fetch_data["id"]; ?>">Print</a></td>
               <td><a class="btn  btn-danger my-3" href="student_fees_deposit_full_list.php ? deleteID=<?php echo $fetch_data["id"]; ?>">Delete</a></td>
                 <td><a class="edit_btn btn btn-success my-3" href="edit_fees.php ? upadateid=<?php echo $fetch_data["id"]; ?>">Edit</a></td>

            </tr>
            <?php
        }
        ?>
    </table>
</div>



        <?php
    }
    ?>
    <?php include("footer.php") ?>
</body>
</html>