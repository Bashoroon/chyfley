<?php 
include 'db.php';
$datez = date ('Y-m-d H:i:s');
$topic = addslashes($_POST['topic']);
$note = addslashes($_POST['note']);
$noteid = addslashes($_POST['noteid']);

$sqlUpdate = $conn->query("update enote set note='$note', topic='$topic' where noteid='$noteid' ") or die(mysqli_error($conn));
header("location: viewEditEnote.php?noteid=$noteid");
