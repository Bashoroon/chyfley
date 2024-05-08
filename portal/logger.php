<?php include 'db.php';
 $username = $_POST ['username'];
 $password = $_POST ['password'];
  $sqlfound  = $conn->query ("SELECT * from users where username ='$username' and password ='$password' and status='1'");
   $found = mysqli_num_rows($sqlfound);
   $role = mysqli_fetch_array($sqlfound);
$admin = $role['username'];
$id = $role['password']; 
$status  = $role['status'];
$name  = $role['name'];
$rolez = $role['role'];  
 if ($found == '1') {
 	session_start();
$_SESSION['username'] = $admin;
$_SESSION['password'] = $id;
$_SESSION['role'] = $rolez;
$_SESSION['status'] = $status;
$_SESSION['name'] = $name;


header("location:index.php?s");
   }else{
header("location:login.php?e");
   }


?>