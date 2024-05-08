<?php
include 'db.php';
$session = $_GET['session']; 
$term = $_GET['term'];
$class = $_GET['class'];
$subject = $_GET['subject'];
$sessionz = $_GET['session'];

 $sqlinputScorePage = $conn->query ("select * from studentscores where session = '$session' and term = '$term' and class= '$class' and subject='$subject' ");
 $found = mysqli_num_rows($sqlinputScorePage );
 
 if ($found < 1) {
	header("location:inputScore.php?s=$session&t=$term&c=$class&sub=$subject");
}else{
	header("location:inputScore.php?e=$sessionz&t=$term&c=$class");
}
 
?>
