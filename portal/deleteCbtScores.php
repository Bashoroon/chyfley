<?php
require 'db.php';

$id = $_GET['id'];

// Fetching session, term, class, and subject from cbtscores table
$sqlFetchTermSession = "SELECT * FROM cbtscores WHERE id='$id'";
$result = $conn->query($sqlFetchTermSession);

if ($result->num_rows > 0) {
    $fetchTermSession = $result->fetch_assoc();
    $session = $fetchTermSession['session'];
    $term = $fetchTermSession['term'];
    $class = $fetchTermSession['class'];
    $subject = $fetchTermSession['subject'];
} else {
    // Handle error if record with given id is not found
    echo "Error: Record not found";
    exit();
}

// SQL to delete a record
$sqlDeleteRecord = "DELETE FROM cbtscores WHERE id='$id'";

if ($conn->query($sqlDeleteRecord) === TRUE) {
    echo "<script>alert('Student CBT score successfully deleted');
          window.location.href='cbtscores.php?session=$session&term=$term&class=$class&subject=$subject&load-student';
          </script>";
} else {
    // Handle error if deletion query fails
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
