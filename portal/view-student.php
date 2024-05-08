<?php
include 'db.php';
$session = $_POST['session']; 
$class = $_POST['class'];
$sessionz = $_POST['session'];

 $sqlstudent = $conn->query ("select * from promotedstudent where session = '$session' and class= '$class' ");
 $found = mysqli_num_rows($sqlstudent);

 if ($found > 0) {
	header("location:studentDetails.php?s=$session&c=$class");
}else{
	header("location:studentDetails.php?e=$sessionz&c=$class");
}
 
?>
