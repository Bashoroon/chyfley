<?php include 'db.php';

$class = $_POST['class'];
 
$sqlclaz = $conn->query ("select * from class where class='$class'");
   $row = mysqli_num_rows($sqlclaz);
 if ($row > 0) { 
header('location:index.php?e');
}

else{$sql = "INSERT INTO class (class)
VALUES ('$class' )";
  ($conn->query($sql) === TRUE)  or die('unable to add class');
    header('location:index.php?s');
}
?>