<?php
include 'db.php';
$session= $_POST['session'];
$class= $_POST['class'];   
foreach ($_POST['id'] as $key => $value) {
		$id = $_POST['id'][$key];
$sqlCheck = $conn->query("select * from promotedstudent where session ='$session' and class='$class' and admissionNo='$id' ");
$check = mysqli_num_rows($sqlCheck);
if ($check > 0) {

}else{
	
$sqlPromote=  $conn->query("insert into promotedstudent(session, class, admissionNo) values ('$session', '$class', '$id')") or die('unable to promote student');  

}
}
header("location: promote-student.php?session=$session&class=$class&load-student");
 
?>