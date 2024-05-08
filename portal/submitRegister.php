<?php include 'db.php';
$name = $_POST['name'];
 $email  = $_POST ['email'];
 $password = $_POST ['password'];
$role = $_POST['role'];
  $sqlfound  = $conn->query ("select * from users where name='$name' and email='$email' and password='$password' and role= '$role'");
   $found = mysqli_num_rows($sqlfound);
   if ($found > 0) {
   die('User already exist');
   }else{

$sqlfixture = "INSERT INTO users (name, email, password, role )
VALUES ('$name', '$email', '$password', '$role')";

 ($conn->query($sqlfixture) === TRUE)  or die('unable to add register');
    header('location:login.php?s');
  
}
?>