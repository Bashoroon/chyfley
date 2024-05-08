<?php require 'db.php';
$admissionNo = $_GET['id'];	
$sqlFetchTErmSession = $conn->query("SELECT * from studentscores where id='$admissionNo'");
$fetchTErmSession = mysqli_fetch_array($sqlFetchTErmSession);
$session = $fetchTErmSession['session'];
$term = $fetchTErmSession['term'];
$class = $fetchTErmSession['class'];
$subject = $fetchTErmSession['subject'];

// sql to delete a record
$sql = "DELETE FROM studentscores WHERE id='$admissionNo'";

if ($conn->query($sql) === TRUE) {
   
echo ("<script LANGUAGE='JavaScript'>
          window.alert('student score succesfully deleted');
           window.location.href='score-sheet.php?session=$session&term=$term&class=$class&subject=$subject';
      
       </script>");
} else {
    echo ("<script LANGUAGE='JavaScript'>
          window.alert('Oops! Something went wrong. Couldn't delete score);
           window.location.href='score-sheet.php?session=$session&term=$term&class=$class&subject=$subject';
      
       </script>");
}

$conn->close();
?>