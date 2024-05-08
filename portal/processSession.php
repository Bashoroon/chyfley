<?php include 'db.php';

$session = $_POST['session'];
 
$sqlsession  = $conn->query ("select * from session where session='$session'");
   $row = mysqli_num_rows($sqlsession);
 if ($row > 0) { 
header('location:index.php?e');
}

else{$sql = "INSERT INTO session (session)
VALUES ('$session' )";
  ($conn->query($sql) === TRUE)  or die('unable to add session');
    header('location:index.php?s');
}
?>