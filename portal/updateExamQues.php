<?php 
include 'db.php';
// $datez = date ('Y-m-d H:i:s');
$question = addslashes($_POST['question']);
$quesid = addslashes($_POST['quesid']);

$sqlUpdate = $conn-> query("update examquestions set questions='$question' where quesid='$quesid' ") or die(mysqli_error($conn));
header("location: editExamQues.php?session=$session&term=$term&class=$class&subject=$subject");
