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

// Iterate through submitted answers
for ($i = 0; $i < count($questions); $i++) {
    $quesid = addslashes($questions[$i]);
    $studentAns = addslashes($studentAnswers[$i]);
    $answer = addslashes($answers[$i]);

    // Check if the question has been answered
    if (!empty($studentAns)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM studentanswers WHERE quesid = ? AND admissionNo = ?");
        $stmt->bind_param("ss", $quesid, $admissionNo);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        // Check if the answer already exists
        if ($result->num_rows > 0) {
            // Update the existing answer
            $stmt = $conn->prepare("UPDATE studentanswers SET studentAnswer = ? WHERE quesid = ? AND admissionNo = ?");
            $stmt->bind_param("sss", $studentAns, $quesid, $admissionNo);
            $stmt->execute();
            $stmt->close();
        } else {
            // Insert a new answer
            $stmt = $conn->prepare("INSERT INTO studentanswers (term, class, session, subject, admissionNo, studentAnswer, answer, quesid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $term, $class, $session, $subject, $admissionNo, $studentAns, $answer, $quesid);
            $stmt->execute();
            $stmt->close();

          

        }
       
echo ("<script LANGUAGE='JavaScript'>
 window.alert('students scores succesfully Added');
  window.location.href='congratulationExam.php?session=$session&term=$term&class=$class&admissionNo=$admissionNo&subject=$subject';

</script>");


    }
}

// Close the database connection
$conn->close();
?>
