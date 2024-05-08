<?php
include 'db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $term = $_POST['term'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $admissionNo = $_POST['admissionNo'];
    $session = $_POST['session'];

    // Retrieve POST data for each question and insert it into the database
    for ($questionIndex = 1; $questionIndex <= $totalQuestions; $questionIndex++) {
        $quesid = $_POST["quesid" . $questionIndex];
        $answer = $_POST["answer" . $questionIndex];
        $studentAns = $_POST["studentAns" . $questionIndex];

        // Perform the database insert for each question
        $sqlAddEnote = "INSERT INTO myanswers (term, class, session, subject, admissionNo, studentAnswer, answer, quesid) VALUES ('$term', '$class', '$session', '$subject', '$admissionNo', '$studentAns', '$answer', '$quesid')";
        
        // Execute the SQL query
        if ($conn->query($sqlAddEnote) === TRUE) {
            // Insertion was successful
        } else {
            // Insertion failed, handle the error
            echo "Error: " . $sqlAddEnote . "<br>" . $conn->error;
        }
    }
    print $studentAns;
    die();
    
    // Redirect or display a success message
    header('location:congratulationExam.php');
} else {
    // Handle the case when the form was not submitted properly
    echo "Form submission error: Missing POST data.";
}
?>
