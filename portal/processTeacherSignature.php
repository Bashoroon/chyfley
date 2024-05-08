<?php 
include 'db.php';
$session = $_POST['session'];
$term= $_POST['term'];
$class = $_POST['class'];
$user = $_POST['user'];


     $sqlAppendSignature = $conn->query("INSERT INTO teachersignature (signature, session, term, class ) VALUES ( '$user', '$session', '$term', '$class')") or die('unable to append signature');
header("location:index.php");
?>