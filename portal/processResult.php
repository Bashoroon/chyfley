<?php 
include 'db.php';
$term = $_GET['term'];
$session = $_GET['session'];
$class = $_GET['class'];

if ($_GET['term'] == "First") {
		header("location: firstTerm.php?term=$term&session=$session&class=$class");	
}if ($_GET['term'] == "Second") {
	header("location: secondTerm.php?term=$term&session=$session&class=$class");
}
?>





if ($founded > 0) {
	header("location:index.php?student-exist=$admissionNo");
}else{
$sqlAddStudent = $conn->query ("INSERT INTO studentusers (admissionNo, surname, firstName, lastName, session, class) VALUES ('$admissionNo', '$surname', '$firstName', '$lastName', '$session', '$class')") or die('unable to add student');


$sqlCurrentClass = $conn->query ("INSERT INTO promotedstudent (admissionNo, session, class) VALUES ('$admissionNo', '$session', '$class')") or die('unable to add student');
header("location: index.php?student-added=$admissionNo");

}