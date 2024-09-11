<?php require 'db.php';
$id = $_GET['id'];	
$session = $_GET['session'];
$term  = $_GET['term'];
$class = $_GET['class'];
$subject = $_GET['subject'];
$exam_type = $_GET['examType'];


// sql to delete a record
$sql = "DELETE FROM questionbank WHERE quesid ='$id'";

if ($conn->query($sql) === TRUE) {
   
echo ("<script LANGUAGE='JavaScript'>
          window.alert('question succesfully deleted');
           window.location.href='previewQues.php?session=$session&class=$class&term=$term&subject=$subject&examType=$exam_type';
      
       </script>");
} else {
    echo ("<script LANGUAGE='JavaScript'>
          window.alert('Oops! Something went wrong. Couldn't delete score);
           window.location.href='previewQues.php?session=$session&class=$class&class=$class&subject=$subject&examType=$exam_type';
      
       </script>");
}

$conn->close();
?>