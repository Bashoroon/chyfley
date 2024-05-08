<?php include 'db.php';

$subject = $_POST['subject'];
 
$sqlsubject = $conn->query ("select * from subject where subject='$subject'");
   $row = mysqli_num_rows($sqlsubject);
 if ($row > 0) { 
header('location:index.php?e');
}

else{$sql = "INSERT INTO subject (subject)
VALUES ('$subject')";
  ($conn->query($sql) === TRUE)  or die('unable to add subject');
    header('location:index.php?s');
}
?>