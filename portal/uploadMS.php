<?php
require 'vendor/autoload.php'; // Ensure PHPWord is installed via Composer
include 'db.php';

use PhpOffice\PhpWord\IOFactory;

$session = $_POST['session'];
$term = $_POST['term'];
$class = $_POST['class'];
$subject = $_POST['subject'];
$exam_type = $_POST['examType'];

$quesid = uniqid();

$filename = $_FILES["file"]["name"];
$target_dir = "questions/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file is a DOCX
if ($fileType != "docx") {
    $errMsg = "Sorry, only DOCX files are allowed.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 50000000) {
    $errMsg = "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "There was an error uploading the file: $errMsg";
} else {
    // Attempt to upload the file
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
        
        // Load the Word document
        $phpWord = IOFactory::load($target_file, 'Word2007');
        $text = '';
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getText')) {
                    $text .= $element->getText() . "\n";
                }
            }
        }

        // Process the text and insert data into the database
        $lines = explode("\n", $text);
        $stmt = $conn->prepare("INSERT INTO questionbank (session, term, class, subject, question, optionA, optionB, optionC, optionD, optionE, answer, exam_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt !== FALSE) {
            $question = "";
            $optionA = $optionB = $optionC = $optionD = $optionE = $answer = "";
            foreach ($lines as $line) {
                $line = trim($line);
                if (preg_match('/^\d+\./', $line)) {
                    if (!empty($question)) {
                        $stmt->bind_param("ssssssssssss", $session, $term, $class, $subject, $question, $optionA, $optionB, $optionC, $optionD, $optionE, $answer, $exam_type);
                        $stmt->execute();
                    }
                    $question = $line;
                    $optionA = $optionB = $optionC = $optionD = $optionE = $answer = "";
                } elseif (preg_match('/^a\)/', $line)) {
                    $optionA = substr($line, 3);
                } elseif (preg_match('/^b\)/', $line)) {
                    $optionB = substr($line, 3);
                } elseif (preg_match('/^c\)/', $line)) {
                    $optionC = substr($line, 3);
                } elseif (preg_match('/^d\)/', $line)) {
                    $optionD = substr($line, 3);
                } elseif (preg_match('/^e\)/', $line)) {
                    $optionE = substr($line, 3);
                } elseif (preg_match('/^Answer:/', $line)) {
                    $answer = substr($line, 8);
                }
            }
            // Insert the last question
            if (!empty($question)) {
                $stmt->bind_param("ssssssssssss", $session, $term, $class, $subject, $question, $optionA, $optionB, $optionC, $optionD, $optionE, $answer, $exam_type);
                $stmt->execute();
            }
            $stmt->close();
            echo ("<script LANGUAGE='JavaScript'>
                      window.alert('Your questions have been submitted ');
                       window.location.href='index.php';
                   </script>");
        } else {
            echo "Error: Failed to prepare database statement.";
        }
    } else {
        echo "Error: There was an error uploading your file.";
    }
}
?>
