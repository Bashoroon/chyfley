<?php require 'db.php';
$id = $_GET['id'];	

// sql to delete a record
$sql = "UPDATE users SET status = '0' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<h3>Teacher deleted successfully</h3>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>