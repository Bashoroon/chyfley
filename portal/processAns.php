<?php 
include 'db.php';
$session = $_POST['session'];
$term  = $_POST['term'];
$class = $_POST['class'];
$datez = date ('Y-m-d H:i:s');
$subject = $_POST['subject'];
$note = addslashes($_POST['note']);
$topic = addslashes($_POST['topic']);
$noteid = uniqid();


$sqlAddEnote = $conn->query("INSERT INTO enote (session, term, class, datez, subject, note, topic, noteid) VALUES ('$session', '$term', '$class', '$datez', '$subject', '$note', '$topic', '$noteid')") or die(mysqli_error($conn));
header("location:viewEditEnote.php?noteid=$noteid");
?>