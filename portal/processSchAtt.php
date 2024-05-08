<?php 
include 'db.php';
$schOpen = $_POST['schOpen'];
$termEnds = $_POST['termEnds'];
$nxtTermBegins = $_POST['nxtTermBegins'];
$session = $_POST['session'];
$term = $_POST['term'];
$sqlSchAtt = $conn->query("select * from schatt where session='$session' and term='$term'");
$founded = mysqli_num_rows($sqlSchAtt);
if ($founded > 0) {
	header("location:schoolAttendance.php?e");
}else{
$sqlAddStudent = $conn->query ("INSERT INTO schatt (schOpen, termEnds, nxtTermBegins, session, term) VALUES ('$schOpen', '$termEnds', '$nxtTermBegins', '$session', '$term')") or die('unable to add attendance');
	header("location:schoolAttendance.php?s");
}?>