<?php include 'db.php';
 $email  = $_POST ['email'];
 $password = $_POST ['password'];
$role = $_POST['role'];
  $sqlfound  = $conn->query ("select * from users where email='$email' and password='$password' and role= '$role'");
   $found = mysqli_num_rows($sqlfound);
   $role = mysqli_fetch_array($sqlfound);
$userRole = $role['role'];
$id = $role['id'];  
 if ($found > 0) {
 	session_start();
$_SESSION['userRole'] = $userRole;
$_SESSION['id'] = $id;

header("location: index.php");
   }else{
header("location:login.php?e");
   }


?>