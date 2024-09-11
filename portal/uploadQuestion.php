<?php
include 'db.php';

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

        echo "Uploaded";
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
    echo ("<script LANGUAGE='JavaScript'>
          window.alert('Your questions have been submitted ');
           window.location.href='index.php';
      
       </script>");
}

?>
