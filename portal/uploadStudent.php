<?php
// Include the database connection
include 'db.php';

$session = $_POST['session'];
$filename = $_FILES["file"]["name"];
$ext = substr($filename, strrpos($filename, "."));
$target_dir = "student/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$errMsg = "";

if ($_FILES["file"]["size"] > 50000000) {
    $errMsg = "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow only CSV file format
if ($ext !== ".csv") {
    $errMsg = "Sorry, only CSV files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "There was an error uploading the File.<br>$errMsg";
} else {
 
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "File uploaded successfully.";

        // Process the CSV file
        if (($file = fopen($target_file, "r")) !== FALSE) {
            // Skip the header row (if it exists)
            fgetcsv($file);

            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                $ran= abs(crc32(uniqid() )  );
            $str= substr($ran, 0,4);
            $admissionNo = "$str";

                // Insert data into "promotedstudent" table
                $sqlCurrent = $conn->query("INSERT INTO promotedstudent (admissionNo, session, class) VALUES ('CHS/23/$admissionNo', '$session', '$emapData[3]')");

                // Insert data into "studentusers" table
                $sqlAddTeacher = $conn->query("INSERT INTO studentusers (admissionNo, session, surname, firstName, lastName, class, gender, dob) VALUES ('CHS/23/$admissionNo', '$session', '$emapData[0]', '$emapData[1]', '$emapData[2]', '$emapData[3]', '$emapData[4]', '$emapData[5]')");

                // Check for any database errors during insertion
                if (!$sqlCurrent || !$sqlAddTeacher) {
                    echo "Database Error: " . $conn->error;
                    exit;
                }
            }
            fclose($file);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
