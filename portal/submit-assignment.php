<?php 
include 'db.php';
$session = $_POST['session'];
$term  = $_POST['term'];
$class = $_POST['class'];
$dates = $_POST['dates'];
$datez = date ('Y-m-d H:i:s');
$subject = $_POST['subject'];
$questions = $_POST['questions'];

$sqlassign = $conn-> query ("INSERT INTO assignment (session, term, class, datez, dates, subject, questions) VALUES ('$session', '$term', '$class', '$datez', '$dates', '$subject', '$questions')") or die('unable to add assignment');
header("location: assignment.php?s");
 ?>
