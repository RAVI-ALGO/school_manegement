<?php 
session_start();
include("db_connection.php");
if (isset($_SESSION['uname'])) {
    $userName = $_SESSION['uname'];
    $UserFetchQuery = mysqli_query($connection, "SELECT * FROM admin_login WHERE User_name='$userName'");
    $FetchData = mysqli_fetch_array($UserFetchQuery);
    //echo$FetchData['Password'];

} 
else
 {
    header("location:index.php");
}
if(isset($_POST['logoutbtn']))
{
    session_destroy();
    header("location:index.php");
 }
?>