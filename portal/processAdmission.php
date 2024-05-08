<?php 
error_reporting(E_ERROR);
include 'db.php';
$admissionNo = $_POST['admissionNO'];
$surname = $_POST['surname'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$session = $_POST['session'];
$class = $_POST['class'];
$gender = $_POST['gender'];
if ($admissionNo == "CHYF" || $admissionNo == "CHYF" ) {
	$random = mt_rand(1000, 9999);
	
	$sqlFindStudent = $conn->query("select * from studentusers where admissionNo='$admissionNo'");
$founded = mysqli_num_rows($sqlFindStudent);
if ($founded > 0) {
// header("location:index.php?student-exist=$random");
	echo "Admission already exist";
}else{
$sqlAddStudent = $conn->query ("INSERT INTO studentusers (admissionNo, surname, firstName, lastName, session, class, gender) VALUES ('$admissionNo$random', '$surname', '$firstName', '$lastName', '$session', '$class', '$gender')") or die(mysqli_error($conn));


$sqlCurrentClass = $conn->query ("INSERT INTO promotedstudent (admissionNo, session, class) VALUES ('$admissionNo$random', '$session', '$class')") or die(mysqli_error($conn));
echo "student added successfully";

}
	
}else{
$sqlFindStudent = $conn->query("select * from studentusers where admissionNo='$admissionNo'");
$founded = mysqli_num_rows($sqlFindStudent);
if ($founded > 0) {
echo "Admission number already exist";
}else{
$sqlAddStudent = $conn->query ("INSERT INTO studentusers (admissionNo, surname, firstName, lastName, session, class, gender) VALUES ('$admissionNo', '$surname', '$firstName', '$lastName', '$session', '$class', '$gender')") or die(mysqli_error($conn));


$sqlCurrentClass = $conn->query ("INSERT INTO promotedstudent (admissionNo, session, class) VALUES ('$admissionNo', '$session', '$class')") or die(mysqli_error($conn));
echo "student added successfully";

}
}
 ?>

