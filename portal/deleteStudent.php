<?php require 'db.php';
$id = $_GET['id'];	
// sql to delete a record
$sql = "UPDATE promotedstudent set deleteStatus='1' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<h3>Student deleted successfully</h3>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>