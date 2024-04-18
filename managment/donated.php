<?php
include "database.php";
session_start();
$username=$_SESSION['username'];
if($username==true){
}
else{
    header("location:sign_in.html");
}
$sql=mysqli_query($conn,"UPDATE `bloodmanage` set `donatedinfo`='donated' WHERE `email`='$username'");
header("location:home.php");
?>