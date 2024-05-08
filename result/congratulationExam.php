<?php 
include 'db.php'; 
$session = $_GET['session'];
$term  = $_GET['term'];
$class = $_GET['class'];
$subject = $_GET['subject'];
$admissionNo = $_GET['admissionNo'];
$sqlCheckAns = $conn->query("SELECT * FROM studentanswers WHERE session='$session' AND term='$term' AND class= '$class' AND subject='$subject' AND admissionNo= '$admissionNo' AND answer = studentAnswer");
$checkedAns = mysqli_num_rows($sqlCheckAns);




$sqlinputScore = $conn->query ("INSERT INTO cbtscores (session, term, class, admissionNo, subject, test ) VALUES ('$session', '$term', '$class', '$admissionNo', '$subject', '$checkedAns')") or die(mysqli_error($conn));


$sqlCheckAns = $conn->query("SELECT * FROM cbtscores WHERE session='$session' AND term='$term' AND class= '$class' AND subject='$subject' AND admissionNo= '$admissionNo'");
  $checkedAns = mysqli_fetch_array($sqlCheckAns);
   

?>
<!DOCTYPE html>
<html lang="en">
<style>
    .congratulation {
  text-align: center;
  padding: 20px;
  background-color: #f1f1f1;
  border-radius: 8px;
}

.icon {
  font-size: 48px;
  color: green;
  margin-bottom: 20px;
}

h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  color: #555;
}

</style>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>CHYFLEY STUDENT PORTAL</title>
    <meta content="Poised to Making Giant Strides" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/chyf_logo.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>

<body style="background-image: url(../images/operating-computer.jpg); background-repeat: no-repeat; background-size: cover;">

    <!-- Begin page -->
    
   
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">
            <div class="card-body">
                
                <center><div class="congratulation">
                    <div class="text-center m-t-0 m-b-15">
                    <a href="login.php" class="logo logo-admin"><img src="assets/images/chyf_logo.png" alt="" height="60"></a>
                </div>
                    <div class="icon">
                       <img src="assets/images/thumb.png">
                    </div>
                    <h2>Congratulations!</h2>
                    <p>You have successfully submitted the exam.</p>
                                        <small>You score<h3><?php print $checkedAns['test'];?></h3></small>
                    <button class=" btn btn-danger"> <a href="logout.php" class = "">Log out</a></button>
                </div></center>


            </div>
        </div>

    </div>

    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>