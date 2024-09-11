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
$exam_type = $_POST['examType'];


$sqlUpdate = "UPDATE questionbank SET status='$status', startDate='$startDate', endDate='$endDate', duration='$duration' WHERE session='$session' AND term='$term' AND class='$class' AND subject='$subject' and exam_type = '$exam_type'";

if ($conn->query($sqlUpdate) === TRUE) {
    echo "<script>
alert('Updated Successfully!');
window.location.href='examination-status.php?session=$session&class=$class&term=$term&examType=$exam_type';
</script>";
   
} else {
    echo "Error updating record: " . $conn->error;
}


?>
