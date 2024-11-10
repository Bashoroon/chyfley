<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foundation Assessment UI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .assessment-container {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    .assessment-header {
      margin-bottom: 20px;
    }
    .question-box {
      background-color: #f3f3f7;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 15px;
    }
    .option {
      background-color: #fff;
      border: 1px solid #e0e0e0;
      padding: 10px;
      border-radius: 5px;
      margin: 10px 0;
      cursor: pointer;
    }
    .option:hover {
      background-color: #f0f0f0;
    }
    .confirm-btn {
      margin-top: 20px;
    }
    .logo {
      font-weight: bold;
      font-size: 24px;
      margin-bottom: 20px;
    }
    .course-list {
      list-style-type: none;
      padding-left: 0;
    }
    .course-list li {
      margin-bottom: 10px;
      padding: 10px;
      background-color: #f8f9fa;
      border-radius: 5px;
    }
    .course-list li.active {
      background-color: #e9ecef;
      font-weight: bold;
    }
  </style>
</head>
<?php $sqlCheckIfDoneBefore = $conn->query("SELECT * FROM cbtscores WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class= '" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "' AND admissionNo= '$user'");
$found = mysqli_num_rows($sqlCheckIfDoneBefore);
$done = mysqli_fetch_array($sqlCheckIfDoneBefore);
$exam_type = $_GET['examType'];
$test = '';
$second = '';
$exam = '';
if($exam_type == 'First'){
    $test = $done['test'];
}elseif($exam_type == 'Second'){
    $second = $done['test_two'];
}else{
    $exam = $done['exam'];
}




if (!empty($test) || !empty($second) || !empty($exam)) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops!</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="wrapper-page">
    <div class="card card-pages shadow-none">
        <div class="card-body">
            <div class="text-center m-t-0 m-b-15">
                <a href="login.php" class="logo logo-admin">
                    <img src="../assets/img/favicon.png" alt="CHYLEY LOGO" height="60">
                </a>
            </div>
            <div class="congratulation">
                <div class="icon">
                    <span class="material-icons">error_outline</span>
                </div>
                <h2>OOPS!</h2>
                <p>This exam has been completed by you! Kindly contact the admin for a reseat.</p>
                <button class="btn btn-custom">
                    <a href="logout.php">Log out</a>
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>


    </div>
<?php } else { ?>
<body>
<?php
      
      if($subject != "ENGLISH LANGUAGE"){
          $recordsPerPage = 1; // Number of records to display per page
          $currentpage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the query string
          $offset = ($currentpage - 1) * $recordsPerPage; // Calculate the offset for the SQL query
          // Ramdomize question if not english
          $sqlQuestions = $conn->query("SELECT * FROM questionbank WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class= '" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "' AND exam_type='".$_GET['examType']."' ORDER BY RAND()");
          $totalRecords = mysqli_num_rows($sqlQuestions);
          $totalPages = ceil($totalRecords / $recordsPerPage);
      }else{
      $recordsPerPage = 1; // Number of records to display per page
      $currentpage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the query string
      $offset = ($currentpage - 1) * $recordsPerPage; // Calculate the offset for the SQL query
      // Ramdomize question if not english
      $sqlQuestions = $conn->query("SELECT * FROM questionbank WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class= '" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "' AND exam_type='".$_GET['examType']."'");
      $totalRecords = mysqli_num_rows($sqlQuestions);
      $totalPages = ceil($totalRecords / $recordsPerPage);
      }
 
  $sqlStudentName =  $conn->query("SELECT * FROM studentusers WHERE admissionNo='$user'");
  $student = mysqli_fetch_array($sqlStudentName);


  ?>
   <?php
    $questionIndex = 0; // Initialize question index
    while ($questions = mysqli_fetch_array($sqlQuestions)) {
        $startDate = $questions['startDate'];
        $endDate = $questions['endDate'];
        $duration = $questions['duration'];
        $sqlCheck = $conn->query("SELECT * FROM studentanswers WHERE quesid='" . $questions['quesid'] . "' AND session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class= '" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "' AND exam_type='".$_GET['examType']."' AND admissionNo= '$user'  ");
        $checked = mysqli_fetch_array($sqlCheck);
        $questionIndex++; // Increment question index
    ?>
  <div class="container mt-4">
    <div class="row">
      
      <!-- Sidebar Column -->
      <div class="col-md-4 sidebar">
        <div class="logo text-primary">Make Academy</div>
        <ul class="course-list">
          <li>Course Introduction</li>
          <li class="active">Make Foundation Assessment</li>
          <li>Course Feedback</li>
        </ul>
        <div class="progress mt-4">
          <div class="progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">33% Complete</div>
        </div>
      </div>

      <!-- Main Content Column -->
      <div class="col-md-8">
        <div class="assessment-container">
          <div class="assessment-header">
            <h2>Make Foundation Assessment</h2>
            <p>Question 4 of 20</p>
          </div>

          <div class="question-box">
            <h5><?php echo $questions['question']; ?></h5>
            <input type="hidden" id="quesid<?php echo $questionIndex; ?>" value="<?php echo $questions['quesid']; ?>" name="quesid">
            <input type="hidden" id="answer<?php echo $questionIndex; ?>" value="<?php echo $questions['answer']; ?>" name="answer">

            <div class="option"><input class="form-check-input" value="A" type="radio" name="studentAns<?php echo $questionIndex; ?>" id="studentAns1<?php echo $questionIndex; ?>" <?php if ($checked['studentAnswer'] == "A") {echo 'checked';} ?>>A. Allow any data to be passed through the filter.</div>
            <div class="option">B. Allow any matching condition to pass through the filter.</div>
            <div class="option">C. Allowing pairs of matching conditions to pass through the filter.</div>
            <div class="option">D. Allow ALL data to pass through a filter.</div>
          </div>

          <button class="btn btn-primary confirm-btn">Confirm</button>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Optional: JavaScript to make the options interactive
    const options = document.querySelectorAll('.option');
    let selectedOption = null;

    options.forEach(option => {
      option.addEventListener('click', () => {
        if (selectedOption) {
          selectedOption.classList.remove('bg-primary', 'text-white');
        }
        option.classList.add('bg-primary', 'text-white');
        selectedOption = option;
      });
    });
  </script>
</body>
</html>
