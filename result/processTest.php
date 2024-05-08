<?php 
include 'db.php';

$session = $_POST['session'];
$term  = $_POST['term'];
$class = $_POST['class'];
$subject = $_POST['subject'];
$admissionNo = $_POST['admissionNo'];
$test = $_POST['test'];

 $sqlCheckAns = $conn->query("SELECT * FROM studentanswers WHERE session='$session' AND term='$term' AND class= '$class' AND subject='$subject' AND admissionNo= '$admissionNo' AND answer = studentAnswer");
  $checkedAns = mysqli_num_rows($sqlCheckAns);
   

        
   
    $sqlinputScore = $conn->query ("INSERT INTO cbtscores (session, term, class, admissionNo, subject, test ) VALUES ('$session', '$term', '$class', '$admissionNo', '$subject', '$checkedAns')") or die(mysqli_error($conn));

echo ("<script LANGUAGE='JavaScript'>
      window.alert('students scores succesfully Added');
       window.location.href='congratulationExam.php?session=$session&term=$term&class=$class&admissionNo=$admissionNo&subject=$subject';
  
   </script>");

	
 ?>
