<?php 
include 'db.php';
// $datez = date ('Y-m-d H:i:s');
$question = addslashes($_POST['ques']);
$quesid = $_POST['quesid'];

$optionA = addslashes($_POST['optionA']);
$optionB = addslashes($_POST['optionB']);
$optionC = addslashes($_POST['optionC']);
$optionD = addslashes($_POST['optionD']);
$optionE = addslashes($_POST['optionE']);
$answer = addslashes($_POST['answer']);


$sqlUpdate = $conn-> query("update questionbank set question='$question', optionA='$optionA', optionB='$optionB', optionC='$optionC', optionD='$optionD', optionE='$optionE', answer='$answer' where quesid='$quesid' ") or die(mysqli_error($conn));


header("location:editExamQues.php?id=$quesid");
