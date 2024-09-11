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
$exam_type = $_POST['examType'];

// $topic = addslashes($_POST['topic']);

$sqlCheck = $conn->query("select * from studentanswers  where quesid='$quesid' AND  session='$session' AND term='$term' AND class= '$class' AND subject='$subject' AND admissionNo= '$admissionNo' AND exam_type='$exam_type'");
$checked = mysqli_num_rows($sqlCheck);
if ($checked > 0) {

    $sqlUpdate = $conn->query ("update studentanswers set studentAnswer='$studentAns' where quesid='$quesid' and admissionNo = '$admissionNo'");
    
}else{
$sqlAddEnote = $conn->query("INSERT INTO studentanswers (term, class, session, subject, admissionNo, studentAnswer, answer, quesid, exam_type) VALUES ('$term', '$class', '$session', '$subject', '$admissionNo', '$studentAns', '$answer',  '$quesid', '$exam_type')") or die(mysqli_error($conn));
}?>