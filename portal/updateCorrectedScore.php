<?php include 'db.php';
$test = $_POST['test'];
$exam = $_POST['exam'];
$id = $_POST['id'];


$sqlUpdateScore = $conn->query("update studentscores set test='$test', exam='$exam' where id='$id'") or die(mysqli_error($conn));

echo ("<script LANGUAGE='JavaScript'>
          window.alert('students scores succesfully Updated');
           window.location.href='editScore.php?id=$id';
      
       </script>");