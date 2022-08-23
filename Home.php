<?php
include("sessionFile.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <title>school manegement Home</title>

    <!-- Bootstrap CSS -->
</head>

<body>
    <header>
        <?php include("header.php"); ?>
        <nav class="navbar navbar-expand-lg navbar-dark fs-5 pt-2 myNav" style="position: sticky;top: 0px;">
            <div class="container-fluid menu py-1">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                            <a class="dropdown-item" href="change_password.php">Change Password</a>
                            <input type="submit" class="dropdown-item" name="logoutbtn" value="Logout"></input>
                        </div>
                    </div>
                    <!-- <button class="btn btn-secondary btn-sm mx-2" type="submit">Logout</button> -->
                </form>
            </div>
        </nav>
    </header>
    <!-- carousel -->
    <div id="carouselExDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="z-index:-999">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="1000">
                <img src="images/banner3.jpg" class="d-block w-100 bannerimg" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bight Future</h5>
                </div>
            </div>
            <div class="carousel-item bg-light" data-bs-interval="2000">
                <img src="images/childrens.png" class="d-block w-50 mx-auto bannerimg" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Learninig with Fun</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="images/pexels-max-fischer-5212345.jpg" class="d-block w-100 bannerimg" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Study,Sports,Cultural Fest</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="text-info bg-success">
        <marquee>
            <h3>Admission open for 2021</h3>
        </marquee>
    </div>
    <div class="container intro mt-2">
        <div class="row">
            <p class=" text fs-2 welcome">Welcome to Delhi Public School</p>
            <p>The school commenced on the 29th January, 1997 with 6 primary classes and a morning preschool group, student numbers totaled 120 and was officially opened on the 11th June, 1997. We are one of six primary schools that serve the rural area and are continually growing in size. We currently have 16 classes and two preschool groups with enrolments around 370. Our priority enrolment area is the Virginia and Bees Creek areas as stated in our Managed Enrolment Policy.</p>
        </div>
        <div class="row">
            <div class="col"><img class="img-fluid" src="images/study.webp"></div>
            <div class="col">
                <span class="fs-5">School Values</span>
                <p>These values were developed in consultation with the school community. The school values are:
                    <br>
                    . A high standard of teaching and learning<br>
                    . A safe and welcoming environment<br>
                    . Family and community involvement<br>
                </p>
                <br>
                <p class="fs-5">School Motto
                </p>
                <p>
                    The school motto was adopted on Harmony Day 2005 where a new school song, created by Ken Brodie, was performed. CARE in the school motto stands for:
                    <br>
                    . Commitment to Learning<br>
                    . Accepting Responsibility<br>
                    . Respect for self, others and the &nbsp;&nbsp;environment<br>
                    . Excellence in all we do
                </p>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0"><em>"Education is the passport to the future, for tomorrow belongs to those who prepare for it today."</em></p><br>
                        <footer class="blockquote-footer">Malcolm X <cite title="Source Title">Source Title</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <p class="text-center fs-2">
        Our Mentors
    </p>
    <hr>

    <div class="container mx-auto row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4  mentors">
        <div class="col mt-3 pb-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top img-thumbnail cardimg" src="images/t2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">K.P. Shreenivasan</h5>
                    <p class="card-text">(Director)</p>
                </div>
            </div>
        </div>
        <div class="col mt-3 pb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top img-thumbnail cardimg" src="images/p1.jpg" alt="Card image cap">
                <div class="card-body Ordercard">
                    <h5 class="card-title">Smrity Jain</h5>
                    <p class="card-text">(Principal)</p>

                </div>
            </div>
        </div>
        <div class="col mt-3 pb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top img-thumbnail cardimg" src="images/te1.webp" alt="Card image cap">
                <div class="card-body Ordercard">
                    <h5 class="card-title">Atharv Singh</h5>
                    <p class="card-text">(Head of Department)</p>
                </div>
            </div>
        </div>
        <div class="col mt-3 pb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top img-thumbnail cardimg" src="images/t3.webp" alt="Card image cap">
                <div class="card-body Ordercard">
                    <h5 class="card-title">Nitin Addani</h5>
                    <p class="card-text">(Founder)</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <?php include("footer.php");
        ?>
    </div>
</body>

</html>