<?php
include 'db.php';
$recordsPerPage = 1; // Number of records to display per page

$sqlQuestions = $conn->query("SELECT * FROM questionbank WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class='" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "'");
$totalRecords = mysqli_num_rows($sqlQuestions);
$totalPages = ceil($totalRecords / $recordsPerPage);

echo $totalPages;
?>
