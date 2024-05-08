<?php include 'db.php';

$term = $_POST['term'];
 
$sqlterm = $conn->query ("select * from term where term='$term'");
   $row = mysqli_num_rows($sqlterm);
 if ($row > 0) { 
header('location:index.php?e');
}

else{$sql = "INSERT INTO term (term)
VALUES ('$term' )";
  ($conn->query($sql) === TRUE)  or die('unable to add term');
    header('location:index.php?s');
}
?>