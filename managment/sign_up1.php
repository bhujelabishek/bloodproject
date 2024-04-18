
<?php
session_start();
$firstname = $_POST['fnames'];
$lastname = $_POST['lnames'];
$age = $_POST['ages'];
$weight = $_POST['weights'];
$bloodg = $_POST['blood']; 
$email = $_POST['em'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$allergy = $_POST['allergys'];
if($age>=18 && $age<=65){
    include "database.php";

    $qer = mysqli_query($conn, "INSERT INTO `bloodmanage`(`fname`,`lname`,`age`,`weig`,`bloodg`,`email`,`passwo`,`cpasswo`,`allergy`,`donatedinfo`) 
    VALUES('$firstname','$lastname', $age , $weight ,'$bloodg', '$email','$pass','$cpass','$allergy','')");
    header("location: sign_in.html");
}

else{
    $_SESSION['error']="* Age must be above 18 !*";
    header("location:sign_up.php");
}

if($weight>=50){
    include "database.php";
    header("location: sign_in.html");
}
else{
    $_SESSION['err'] = "*Weight Should be above 50 or 40!*";
    header("location: sign_up.php");
}

$pattern = '/^[a-zA-Z0-9._%+-]+@gmail\.com$/';
if(preg_match($pattern, $email)){
    include "database.php";
    header("location: sign_in.html");
}
else{
    $_SESSION['erro'] = "*Invalid Email*";
    header("location: sign_up.php");
}


$min_length = 8;
if(strlen($pass) > $min_length){
    include "database.php";
   header("location: sign_in.html");
   
}
else{
    $_SESSION['erorred']= "*Password must be length of 8!*";
    header("location: sign_up.php");
}
?>

