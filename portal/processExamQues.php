<?php 
include 'db.php';
$term  = $_POST['term'];
$class = $_POST['class'];
$session = $_POST['session'];
$subject = $_POST['subject'];

$ques = addslashes($_POST['ques']);
$A = addslashes($_POST['A']);
$B = addslashes($_POST['B']);
$C = addslashes($_POST['C']);
$D = addslashes($_POST['D']);
$E = addslashes($_POST['E']);
$ans = addslashes($_POST['ans']);
$quesid = uniqid();

$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

// $topic = addslashes($_POST['topic']);
$quesid = uniqid();


$sqlAddEnote = $conn->query("INSERT INTO questionbank (term, class, session, subject, question, optionA, optionB, optionC, optionD, optionE, answer, startDate, endDate, quesidd) VALUES ('$term', '$class', '$session', '$subject', '$ques', '$A', '$B', '$C', '$D', '$E', '$ans', '$startDate', '$endDate',  '$quesid')") or die(mysqli_error($conn));
header("location:addQues.php?session=$session&term=$term&class=$class&subject=$subject&startDate=$startDate&endDate=$endDate");
?>