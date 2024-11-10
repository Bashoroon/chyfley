<?php

namespace Controllers\Cbt;
use PhpOffice\PhpWord\IOFactory;

class Cbt
{
    public function add_ques()
    {


        global $conn;

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
        return "Question Added";
    }

    public function uploadCSVQuestion()
    {
        global $conn;
        $session = $_POST['session'];
        $term = $_POST['term'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $exam_type = $_POST['examType'];

        $quesid = uniqid();

        $filename = $_FILES["file"]["name"];
        $ext = substr($filename, strrpos($filename, "."), (strlen($filename) - strrpos($filename, ".")));
        $target_dir = "questions/";
        $target_file = $_FILES["file"]["name"];
        $uploadOk = 1;
        $random_digit = rand(0000, 9999);
        $new_file_name = "$random_digit.$target_file";
        $path = "questions/" . $target_file;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if ($_FILES["file"]["size"] > 50000000) {
            $errMsg = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "csv") {
            $errMsg = "Sorry, only CSV files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "There was error uploading the File.<br>$errMsg";
            // if everything is ok, try to upload file
        } else {
            if (copy($_FILES["file"]["tmp_name"], $path)) {

               // echo "Uploaded";
            }
        }
        //we check,file must be have csv extention
        if ($ext == ".csv") {
            $file = fopen($path, "r");
            $questionsData = array(); // Initialize an array to store the CSV data
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                $questionsData[] = $emapData; // Store each row in the array
            }
            fclose($file); // Close the file after reading

            // Insert data into the database outside the loop
            foreach ($questionsData as $data) {
                $sqlAddExamQues = $conn->query("INSERT INTO questionbank (session, term, class, subject, question, optionA, optionB, optionC, optionD, optionE, answer, exam_type) VALUES ('$session', '$term', '$class', '$subject', '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$exam_type')") or die(mysqli_error($conn));
            }
           return "Question Uploaded in CSV";
      
      
        }
    }

    public function uploadMS(){
     //
 global $conn;


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
                return "Question Uploaded in docx";
            }
            $stmt->close();
            
        } else {
            echo "Error: Failed to prepare database statement.";
        }
    } else {
        echo "Error: There was an error uploading your file.";
    }
}


    }
    // Edit CBT Score
    public function edit($id)
    {
        global $conn;
        $sqlStudentScore =  $conn->query("SELECT * from cbtscores where id='$id' ");
        $studentScore = mysqli_fetch_array($sqlStudentScore);

        return $studentScore;
    }

    public function update()
    {
        global $conn;
        $test = $_POST['test'];
        $test_two = $_POST['testTwo'];
        $exam = $_POST['exam'];
        $id = $_POST['id'];


        $sqlUpdateScore = $conn->query("update cbtscores set test='$test', test_two='$test_two', exam='$exam' where id='$id'") or die(mysqli_error($conn));

        return "<span class='alert alert-success float-right'> Student CBT scores Updated</span>";
    }

   // a student cbt scores
    public function cbtscores($admissionNo){
        global $conn;
        $sqlStudentCbtScore = $conn->query("SELECT * from cbtscores where session='" . $_GET['session'] . "' and class = '" . $_GET['class'] . "' and term='" . $_GET['term'] . "' and admissionNo='$admissionNo' and subject='" . $_GET['subject'] . "'");
        $cbtScores = mysqli_fetch_array($sqlStudentCbtScore);
       return $cbtScores;
    }

    
}
