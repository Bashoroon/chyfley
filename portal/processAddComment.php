<?php include 'db.php';

$teacherscomment = $_POST['teacherscomment'];
 
$sqlterm = $conn->query ("select * from teacherscomment where comment='$teacherscomment'");
   $row = mysqli_num_rows($sqlterm);
 if ($row > 0) { 
header("location:index.php?e");
}

else{$sql = "INSERT INTO teacherscomment (comment)
VALUES ('$teacherscomment' )";
  ($conn->query($sql) === TRUE)  or die('unable to add teachers comment');
header("location:index.php?s");
}

?>