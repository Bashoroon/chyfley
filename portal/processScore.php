<?php 
include 'db.php';
$session = $_POST['session'];
$term  = $_POST['term'];
$class = $_POST['class'];
$subject = $_POST['subject'];

foreach ($_POST['admissionNo'] as $key => $value) {
	$admissionNo = $_POST['admissionNo'][$key];
		$test = $_POST['test'][$key];
		$exam = $_POST['exam'][$key];
		if ($test !="" and $exam !=""){
 
		$sqlinputScore = $conn->query ("INSERT INTO studentscores (session, term, class, admissionNo, subject, test, exam ) VALUES ('$session', '$term', '$class', '$admissionNo', '$subject', '$test', '$exam')") or die(mysqli_error($conn));

echo ("<script LANGUAGE='JavaScript'>
          window.alert('students scores succesfully Added');
           window.location.href='inputScore.php?session=$session&class=$class&term=$term&subject=$subject&load-student';
      
       </script>");

}


	}

	
 ?>
