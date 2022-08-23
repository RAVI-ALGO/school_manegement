<?php
include("db_connection.php");
include("sessionFile.php");
if (isset($_REQUEST['printID'])) {
    $receiptId = $_REQUEST['printID'];
    $selectQuery = mysqli_query($connection, "SELECT * FROM student_fees WHERE id='$receiptId'");
    $Row_count = mysqli_num_rows($selectQuery);
    $fetch_dat = mysqli_fetch_array($selectQuery);
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
    <script>
        $(document).ready(function()
        {
            window.print();
        });
    </script>
    <title>Fees Receipt</title>
</head>

<body>
    <div class="border border-dark bg-light" style="width: 800px;">
        <div class="row">
            <div class="col-2 logoArea">
                <img src="images/logo.png" class="logoimg mt-2" height="100px" alt="DPS">
            </div>
            <div class="col-7 justify-content-center mt-3 ">
                <span class="fs-4 text-center">Delhi Public School</span><br>
                <span class="fs-6">sector 4 Shivaji nagar New Delhi.</span><br>
                <span class="fs-6">Phone no. 0731-6777777 </span>
            </div>
            <div class="row border-top border-dark">
                <span class=" fs-5 text-center text-muted">Fee Receipt</span>
            </div>
            <div class="row border-top border-dark">
                <div class="col-6 mt-3">
                    <span class="fs-5 mx-3 fw-bolder">Schollar no.</span>
                    <span class="fs-5 mx-3"><?php echo $fetch_dat['schollar_no']; ?></span>
                </div>
                <div class="col-6 mt-3">
                    <span class="fs-5 fw-bolder">Receipt NO.</span>
                    <span class="fs-5 mx-3"><?php echo "#DPS" . $fetch_dat['id']; ?></span>
                </div>
            </div>
            <div class="row">

                <div class="col-6 mt-3">
                    <span class="fs-5 mx-3 fw-bolder">Student Name : </span>
                    <span class="fs-5 text-capitalize"><?php echo $fetch_dat['name']; ?></span>
                </div>
                <div class="col-6 mt-3 ">
                    <span class="fs-5 fw-bolder">Father's Name : </span>
                    <span class="fs-5 text-capitalize"><?php echo $fetch_dat['father_name']; ?></span>
                </div>

            </div>
            <div class="row">

                <div class="col-6 mt-3">
                    <span class="fs-5 mx-3 fw-bolder">Class.</span>
                    <span class="fs-5 mx-3"><?php echo $fetch_dat['class']; ?></span>
                </div>
                <div class="col-6 mt-3">
                    <span class="fs-5 fw-bolder">Section.</span>
                    <span class="fs-5 mx-3"><?php echo $fetch_dat['section']; ?></span>
                </div>

            </div>
            <div class="row">

                <div class="col-6 mt-3">
                    <span class="fs-5 mx-3 fw-bolder">Mobile NO.</span>
                    <span class="fs-5 mx-3"><?php echo $fetch_dat['mobile']; ?></span>
                </div>
                <div class="col-6 mt-3">
                    <span class="fs-5 fw-bolder">Date.</span>
                    <span class="fs-5  mx-3"><?php echo date("Y/m/d"); ?></span>
                </div>

            </div>
            <div class="row border-top border-bottom border-dark mt-5 pt-2 pb-2">
                <div class="col-6 ">
                    <span class="fs-5 mx-3 fw-bolder">Payment Date.</span>
                    <span class="fs-5 mx-3"><?php echo $fetch_dat['pay_date']; ?></span>
                </div>
                <div class="col-6 ">
                    <span class="fs-5 mobile fw-bolder">Amount.</span>
                    <span class="fs-5  mx-3"><?php echo $fetch_dat['last_transaction_amount'] . "RS"; ?></span>
                </div>
            </div>
            <div class="row border  mt-5">
                <p class="term_para"><b>*Terms and Conditions for Registration with DPS </b></p>
                <p class="term_para1 text-danger">* Amount is non refundable for any case.</p>
                <p class="term_para1 text-danger">* DPS reserves the right to cancel for any registration and services.</p>
                <p class="term_para1 text-danger">* DPS is not responsible for any type of transaction fail.</p>
            </div>
        </div>
    </div>
    </div>
</body>

</html>