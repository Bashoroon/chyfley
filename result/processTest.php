<?php 
include 'db.php';

$session = $_POST['session'];
$term  = $_POST['term'];
$class = $_POST['class'];
$subject = $_POST['subject'];
$admissionNo = $_POST['admissionNo'];
$exam_type = $_POST['examType'];

// Calculate number of correct answers
$sqlCheckAns = $conn->query("SELECT * FROM studentanswers WHERE session='$session' AND term='$term' AND class='$class' AND subject='$subject' AND admissionNo='$admissionNo' AND exam_type='$exam_type' AND answer = studentAnswer");
$checkedAns = mysqli_num_rows($sqlCheckAns);

// Check if score for that session, term, class, and student exists
$sqlcheckCbtScore = $conn->query("SELECT * FROM cbtscores WHERE session='$session' AND term='$term' AND class='$class' AND subject='$subject' AND admissionNo='$admissionNo'");
$checkedScore = mysqli_num_rows($sqlcheckCbtScore);
$score = mysqli_fetch_array($sqlcheckCbtScore);



if($checkedScore > 0) {
    if ($exam_type == 'First') {
        // Update test score for 'First' exam type
        $update = $conn->query("UPDATE cbtscores SET test ='$checkedAns' WHERE session='$session' AND term='$term' AND class='$class' AND subject='$subject' AND admissionNo='$admissionNo'");
    } elseif($exam_type == 'Second' ) {
        // Update test score for 'Second' exam type
        $update = $conn->query("UPDATE cbtscores SET test_two ='$checkedAns' WHERE session='$session' AND term='$term' AND class='$class' AND subject='$subject' AND admissionNo='$admissionNo'"); 
    } elseif($exam_type == 'Exam') {
        // Update test score for 'Exam' type
        $update = $conn->query("UPDATE cbtscores SET exam ='$checkedAns' WHERE session='$session' AND term='$term' AND class='$class' AND subject='$subject' AND admissionNo='$admissionNo'"); 
    }

    
 
   
} else {
  if ($exam_type == 'First') {
    $sqlinputScore = $conn->query ("INSERT INTO cbtscores (session, term, class, admissionNo, subject, test ) VALUES ('$session', '$term', '$class', '$admissionNo', '$subject', '$checkedAns')") or die(mysqli_error($conn));

    }elseif($exam_type == 'Second'){
      $sqlinputScore = $conn->query ("INSERT INTO cbtscores (session, term, class, admissionNo, subject, test_two ) VALUES ('$session', '$term', '$class', '$admissionNo', '$subject', '$checkedAns')") or die(mysqli_error($conn));
    }
    elseif($exam_type == 'Exam'){
      $sqlinputScore = $conn->query ("INSERT INTO cbtscores (session, term, class, admissionNo, subject, exam ) VALUES ('$session', '$term', '$class', '$admissionNo', '$subject', '$checkedAns')") or die(mysqli_error($conn));
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://portal.chyfleyschools.com.ng/images/chyf_logo.png" type="image/x-icon">
    <style>
        .wrapper-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f8fc;
        }

        .card-pages {
            border-radius: 12px;
            overflow: hidden;
            border: none;
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card-body {
            padding: 2rem;
        }

        .text-center img {
            width: 60px;
            height: auto;
            margin-bottom: 15px;
        }

        .congratulation .icon img {
            width: 80px;
            height: auto;
            margin-bottom: 20px;
        }

        .congratulation h2 {
            font-size: 28px;
            color: #28a745;
            margin-bottom: 10px;
        }

        .congratulation p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .congratulation small {
            display: block;
            font-size: 14px;
            color: #333;
        }

        .congratulation h3 {
            font-size: 32px;
            color: #007bff;
            margin-top: 10px;
            font-weight: bold;
        }

        .btn-custom {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 25px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #c82333;
            text-decoration: none;
        }

        .btn-custom a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="wrapper-page">
    <div class="card card-pages shadow-none">
        <div class="card-body">
            <div class="text-center m-t-0 m-b-15">
                <a href="login.php" class="logo logo-admin">
                    <img src="https://portal.chyfleyschools.com.ng/images/chyf_logo.png" alt="Logo">
                </a>
            </div>
            <div class="congratulation">
                <div class="icon">
                    <img src="diagram/thumb.png" alt="Icon">
                </div>
                <h2>Congratulations!</h2>
                <p>You have successfully submitted the exam.</p>
                <small>Your score:</small>
                <h3><?php echo $checkedAns; ?>%</h3>
                <button class="btn btn-custom">
                    <a href="logout.php">Log out</a>
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>


<!-- jQuery and other scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php 
// Exit script after displaying the page
exit();
?>

