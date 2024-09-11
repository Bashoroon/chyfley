<?php 
include 'db.php';
$term  = $_POST['term'];
$class = $_POST['class'];
$session = $_POST['session'];
$subject = $_POST['subject'];
$ques = addslashes($_POST['ques']);
$optionA = addslashes($_POST['optionA']);
$optionB = addslashes($_POST['optionB']);
$optionC = addslashes($_POST['optionC']);
$optionD = addslashes($_POST['optionD']);
$optionE = addslashes($_POST['optionE']);
$answer = $_POST['answer'];
$exam_type = $_POST['exam_type'];

$sqlAddEnote = $conn->query("INSERT INTO questionbank (term, class, session, subject, question, optionA, optionB, optionC, optionD, optionE, answer,  exam_type) VALUES ('$term', '$class', '$session', '$subject', '$ques', '$optionA', '$optionB', '$optionC', '$optionD', '$optionE', '$answer', '$exam_type')") or die(mysqli_error($conn));
header("location:addQues.php?session=$session&term=$term&class=$class&subject=$subject&examType=$exam_type");
?>