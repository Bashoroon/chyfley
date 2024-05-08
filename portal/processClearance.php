<?php
include 'db.php';
$session= $_POST['session'];
$class= $_POST['class'];
$term= $_POST['term'];   
foreach ($_POST['id'] as $key => $value) {
		$id = $_POST['id'][$key];


$sqlclear=  $conn->query("insert into clearance(session, term, class, admissionNo) values ('$session', '$term', '$class', '$id')") or die('unable to clear student');  

}
header("location: clearance.php?session=$session&term=$term&class=$class");
 
?>