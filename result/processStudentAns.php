<?php 
include 'db.php';
$term  = $_POST['term'];
$class = $_POST['clazz'];
$session = $_POST['session'];
$subject = $_POST['subject'];
$admissionNo = $_POST['admissionNo'];

$quesid = addslashes($_POST['quesid']);
$studentAns = addslashes($_POST['studentAns']);
$answer = addslashes($_POST['answer']);


// $topic = addslashes($_POST['topic']);

$sqlCheck = $conn->query("select * from studentanswers  where quesid='$quesid' AND admissionNo='$admissionNo'");
$checked = mysqli_num_rows($sqlCheck);
if ($checked > 0) {

    $sqlUpdate = $conn->query ("update studentanswers set studentAnswer='$studentAns' where quesid='$quesid' and admissionNo = '$admissionNo'");
    
}else{
$sqlAddEnote = $conn->query("INSERT INTO studentanswers (term, class, session, subject, admissionNo, studentAnswer, answer, quesid) VALUES ('$term', '$class', '$session', '$subject', '$admissionNo', '$studentAns', '$answer',  '$quesid')") or die(mysqli_error($conn));
}?>