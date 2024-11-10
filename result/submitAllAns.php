<?php
include 'db.php';

$term = $_POST['term'];
$class = $_POST['clazz'];
$session = $_POST['session'];
$subject = $_POST['subject'];
$admissionNo = $_POST['admissionNo'];

$questions = $_POST['quesid']; // Retrieve an array of quesid
$studentAnswers = $_POST['studentAns']; // Retrieve an array of studentAns
$answers = $_POST['answer']; // Retrieve an array of correct answers

$quesids = $_POST['quesid']; // Array of question IDs
$answers = $_POST['answer']; // Array of correct answers
$studentAnswers = $_POST['studentAns']; // Array of student answers indexed by question

// Loop through and process the submissions
foreach ($quesids as $index => $quesid) {
    $correctAnswer = $answers[$index];
    $studentAnswer = $studentAnswers[$index];
    
    // Process each answer
    // Example: Insert into database, check correctness, etc.
}

       
echo ("<script LANGUAGE='JavaScript'>
 window.alert('students scores succesfully Added');
  window.location.href='congratulationExam.php?session=$session&term=$term&class=$class&admissionNo=$admissionNo&subject=$subject';

</script>");


   

// Close the database connection
$conn->close();
?>
