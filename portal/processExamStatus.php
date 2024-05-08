<?php
include 'db.php';

$term = $_POST['term'];
$class = $_POST['class'];
$session = $_POST['session'];
$subject = $_POST['subject'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$status = $_POST['status'];
$duration = $_POST['duration'];


$sqlUpdate = "UPDATE questionbank SET status='$status', startDate='$startDate', endDate='$endDate', duration='$duration' WHERE session='$session' AND term='$term' AND class='$class' AND subject='$subject'";

if ($conn->query($sqlUpdate) === TRUE) {
    header("location: examination-status.php?session=$session&term=$term&class=$class");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


?>
