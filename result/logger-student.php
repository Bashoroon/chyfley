<?php
include 'db.php';

$surname = $_POST['surname']; 
$password = $_POST['password'];
//$substrPass = substr($password, -4);
$sqlfound = $conn->query("SELECT * FROM studentusers WHERE admissionNo ='$surname' AND password = '$password'");
$found = mysqli_num_rows($sqlfound);
$role = mysqli_fetch_array($sqlfound);
$user = $role['admissionNo'];  

if ($found > 0) {
    session_start();
    $_SESSION['admissionNo'] = $user;

    // Debug: Print admissionNo
  

    // Redirect to index.php
    header("location:index.php?s");
  
} else {
    header("location:student-login.php?e");

}
?>
