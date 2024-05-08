<?php 
include 'db.php';
$session = $_POST['session'];
$class = $_POST['class'];
$term = $_POST['term'];
foreach ($_POST['admissionNo'] as $key => $value) {
	$admissionNo = $_POST['admissionNo'][$key];
		$present = $_POST['present'][$key];
		$comment = $_POST['comment'][$key];
		if ($present != "" and $comment != "" ) {
			
$sqlAddStudent = $conn->query ("INSERT INTO studentatt (admissionNo, present, comment, session, term, class) VALUES ('$admissionNo', '$present', '$comment', '$session', '$term', '$class')") or die('unable to add attendance or comment');
	}
	header("location:comment-attendance.php?session=$session&term=$term&class=$class");

}
?>