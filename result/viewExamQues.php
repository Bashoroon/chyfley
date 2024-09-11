<?php include 'db.php';
include 'header.php';

$user = $_SESSION['admissionNo'];

error_reporting(0);
?>
<script>
    function disableRefresh(e) {
        if ((e.which || e.keyCode) === 116 || (e.which || e.keyCode) === 82 && (e.ctrlKey || e.metaKey)) {
            e.preventDefault();
        }
    }

    function disableButtonRefresh() {
        window.addEventListener("beforeunload", function (e) {
            e.preventDefault();
        });
    }
    
    document.addEventListener("keydown", disableRefresh);
    document.addEventListener("DOMContentLoaded", disableButtonRefresh);
</script>
<?php
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    .question {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .option {
        font-size: 16px;
        margin-bottom: 5px;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }




    /* Hide all steps by default: */
    .tab {
        display: none;
    }



    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        background-color: blue;
        color: white;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }


    .wrapper-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
        }

        .card-pages {
            border-radius: 15px;
            overflow: hidden;
            border: none;
            max-width: 450px;
            background-color: #fff;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card-body {
            padding: 2.5rem 2rem;
        }

        .text-center img {
            width: 70px;
            height: auto;
            margin-bottom: 20px;
        }

        .congratulation .icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80px;
            height: 80px;
            background-color: #ffc107;
            border-radius: 50%;
            margin: 0 auto 20px;
        }

        .congratulation .icon .material-icons {
            font-size: 48px;
            color: #fff;
        }

        .congratulation h2 {
            font-size: 30px;
            color: #dc3545;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .congratulation p {
            font-size: 16px;
            color: #555;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .btn-custom {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 25px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-custom:hover {
            background-color: #c82333;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
        }

        .btn-custom a {
            color: #fff;
            text-decoration: none;
        }
</style>
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
        $recordsPerPage = 1; // Number of records to display per page
        $currentpage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the query string
        $offset = ($currentpage - 1) * $recordsPerPage; // Calculate the offset for the SQL query

        $sqlQuestions = $conn->query("SELECT * FROM questionbank WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class= '" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "' AND exam_type='".$_GET['examType']."' ");
        $totalRecords = mysqli_num_rows($sqlQuestions);
        $totalPages = ceil($totalRecords / $recordsPerPage);

        $sqlStudentName =  $conn->query("SELECT * FROM studentusers WHERE admissionNo='$user'");
        $student = mysqli_fetch_array($sqlStudentName);


        ?>
        <center>
            <div class="row">
                <div class="col-12">
                    <h3 style="color:green;" class="float-end" id="timer"></h3>
                    <h3 style="color:red; display:none" class="float-end" id="timeup">Time up!</h3>
                </div>
            </div>
        </center>
        <div id="regForm">
            <div id="ques">
                <!-- <h1>Register:</h1> -->
                <!-- One "tab" for each step in the form: -->
           
              
                    <?php
$questionIndex = 0;
$no = 1;
while ($questions = mysqli_fetch_array($sqlQuestions)) {
    $sqlCheck = $conn->prepare("SELECT * FROM studentanswers WHERE quesid=? AND session=? AND term=? AND class=? AND subject=? AND exam_type=? AND admissionNo=?");
    $sqlCheck->bind_param("sssssss", $questions['quesid'], $_GET['session'], $_GET['term'], $_GET['class'], $_GET['subject'], $_GET['examType'], $user);
    $sqlCheck->execute();
    $checked = $sqlCheck->get_result()->fetch_assoc();
    $questionIndex++;
    ?>
    <div class="tab" style="display: none;">
        <!-- Display student and question details -->
        <div class="text-centser">
            <img src="assets/images/exam_logo.png" height="auto" wsidth="80%" alt="">
        </div>
        <div class="text-center">
            <?php if (empty($student['passport'])) { ?>
                <img src="../portal/passport/images.jfif" alt="" class="img-responsive" style="border-radius: 50%; width: 20vw;">
            <?php } else { ?>
                <img src="../portal/passport/<?php echo htmlspecialchars($student['passport']); ?>" alt="" class="img-responsive" style="border-radius: 50%; width: 20vw;">
            <?php } ?>
            <h5 class="text-dark"><?php echo htmlspecialchars($student['surname'] . ' ' . $student['firstName'] . ' ' . $student['lastName']); ?></h5>
            <h6 class="text-dark"><?php echo htmlspecialchars($student['admissionNo']); ?></h6>
            <?php echo htmlspecialchars($founded['class']); ?>
        </div>

        <!-- Display the question -->
        <div class="mt-3">
            <h3><?php echo htmlspecialchars($_GET['subject']); ?></h3>
        </div>
        <div class="question"><?php echo 'Q'.$no++. '. ' .$questions['question']; ?></div>

        <input type="hidden" id="quesid<?php echo $questionIndex; ?>" value="<?php echo $questions['quesid']; ?>" name="quesid">
        <input type="hidden" id="answer<?php echo $questionIndex; ?>" value="<?php echo $questions['answer']; ?>" name="answer">
        
        
        <!-- Display options -->
        <?php foreach (['A', 'B', 'C', 'D'] as $option) { ?>
            <div class="form-check">
                <input class="form-check-input" value="<?php echo $option; ?>" type="radio" name="studentAns<?php echo $questionIndex; ?>" id="studentAns<?php echo $option . $questionIndex; ?>" <?php echo ($checked['studentAnswer'] == $option) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="studentAns<?php echo $option . $questionIndex; ?>">
                    <?php echo $questions['option' . $option] ?>
                </label>
            </div>
            
        <?php } ?>
    </div>
    <div id="result"></div>
<?php } ?>

    
<br><br>
    <div style="overflow:auto;">
        <div style="float:left;">
            <center>
                <div class="pagination text-center">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center flex-wrap">
                            <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <?php
                            $sqlQuestions = $conn->query("SELECT * FROM questionbank WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class='" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "' AND exam_type='".$_GET['examType']."'");
                            $pageNumber = 1;
                            $currentTab = 0;
                            while ($questions = mysqli_fetch_array($sqlQuestions)) {
                                $activeClass = ($pageNumber - 1 == $currentTab) ? 'active' : '';
                            ?>
                                <li class="page-item step <?php echo $activeClass; ?>">
                                    <a class="page-link" href="#" onclick="showTab(<?php echo $pageNumber - 1; ?>)"><?php echo $pageNumber; ?></a>
                                </li>
                            <?php
                                $pageNumber++;
                            } ?>
                            <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </ul>
                    </nav>
                </div>
            </center>
        </div>
    </div>
    <!-- Add a single submit button to submit all answers -->
   <form action="processTest.php" method="post">

 <input type="hidden" id="term" value="<?php print $_GET['term']; ?>" name="term">
                            <input type="hidden" id="clazz" value="<?php print $_GET['class']; ?>" name="class">
                            <input type="hidden" id="subject" value="<?php print $_GET['subject']; ?>" name="subject">
                            <input type="hidden" name="admissionNo" id="admissionNo" value="<?php print $user; ?>">
                            <input type="hidden" name="session" id="session" value="<?php print $_GET['session']; ?>">
                            <input type="hidden" name="examType" id="examType" value="<?php print $_GET['examType']; ?>">
                           
                              <div class="text-center mt-3">
        <button type="submit" class="btn btn-success">Submit All Answers</button>
    </div>
                        </form>
                    </div>

        </div>
       
    <?php } ?>
    <!-- Circles which indicate the steps of the form: -->


    <?php include 'footer.php'; ?>


    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            // Hide all tabs
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            // Show the selected tab
            x[n].style.display = "block";
            // Update currentTab to the selected tab
            currentTab = n;

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").style.display = "none";
            } else {
                document.getElementById("nextBtn").style.display = "inline";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        function validateForm() {
            // Add your validation logic here if needed
            return true;
        }
    </script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    let currentTab = 0;
    showTab(currentTab);

    function showTab(n) {
        const tabs = document.getElementsByClassName("tab");
        Array.from(tabs).forEach((tab, index) => {
            tab.style.display = index === n ? "block" : "none";
        });

        document.getElementById("prevBtn").style.display = n === 0 ? "none" : "inline";
        document.getElementById("nextBtn").style.display = n === tabs.length - 1 ? "none" : "inline";
        fixStepIndicator(n);
    }

    function nextPrev(n) {
        const tabs = document.getElementsByClassName("tab");
        if (n === 1 && !validateForm()) return false;
        tabs[currentTab].style.display = "none";
        currentTab += n;
        if (currentTab >= tabs.length) {
            document.getElementById("regForm").submit();
            return false;
        }
        showTab(currentTab);
    }

    function fixStepIndicator(n) {
        const steps = document.getElementsByClassName("step");
        Array.from(steps).forEach(step => step.className = step.className.replace(" active", ""));
        steps[n].className += " active";
    }

    function validateForm() {
        // Validation logic
        return true;
    }

    // Debounce function to limit the rate of AJAX calls
    function debounce(func, delay) {
        let debounceTimer;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => func.apply(context, args), delay);
        }
    }

    // Handle change event for answer selection with debouncing
    $(document).ready(function() {
    $("input[name^='studentAns']").change(function() {
        var questionIndex = $(this).attr("name").replace("studentAns", "");

        var session = $("#session").val();
        var term = $("#term").val();
        var clazz = $("#clazz").val();
        var subject = $("#subject").val();
        var admissionNo = $("#admissionNo").val();
        var quesid = $("#quesid" + questionIndex).val();
        var answer = $("#answer" + questionIndex).val();
        var studentAns = $("input[name='studentAns" + questionIndex + "']:checked").val();
        var examType = $("#examType").val(); // Add this line to get the examType value

        // Send data to the server using AJAX
        $.ajax({
            url: "processStudentAns.php",
            type: "POST",
            data: {
                session: session,
                term: term,
                clazz: clazz,
                subject: subject,
                admissionNo: admissionNo,
                quesid: quesid,
                studentAns: studentAns,
                answer: answer,
                examType: examType // Add this line to include examType in the data sent
            },
            beforeSend: function() {
                // Show loading indicator before sending the request
                $("#result").html("<p>Loading...</p>");
            },
            success: function(response) {
                // Display the response from the server
                $("#result").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Display an error message
                $("#result").html("Error in connection. Please check your connection: " + textStatus);
            }
        });
    });
});

});

    </script>

    <script>
        var countDownDate = <?php
                            date_default_timezone_set('Africa/Lagos');
                            echo strtotime($endDate) ?> * 1000;
        var now = <?php echo time() ?> * 1000;

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            // 1. JavaScript
            // var now = new Date().getTime();
            // 2. PHP
            now = now + 1000;

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("time").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("ques").innerHTML = "<h1>Examination completed.</h1><p>Goodluck!</p>";
                $("#time").hide();
                $("#timeup").show();
            } else {
                $("#ques").show();
            }
        }, 1000);
    </script>
    <script>
        var durationInMinutes = <?php echo $duration; ?>; // Duration in minutes

        function startTimer() {
            var timerElement = document.getElementById("timer");

            var hours, minutes, seconds;

            var durationInSeconds = durationInMinutes * 60; // Convert duration to seconds

            var countdown = setInterval(function() {
                hours = Math.floor(durationInSeconds / 3600);
                minutes = Math.floor((durationInSeconds % 3600) / 60);
                seconds = durationInSeconds % 60;

                timerElement.textContent = hours + "h " + minutes + "m " + seconds + "s";

                if (durationInSeconds <= 0) {
                    clearInterval(countdown);
                    document.getElementById("ques").innerHTML = "<h1>Examination completed.</h1><p>Goodluck!</p>";
                    $("#time").hide();
                    $("#timeup").show();
                } else {
                    $("#ques").show();
                }

                durationInSeconds--;
            }, 1000);
        }

        // Call the startTimer function when the question is shown
        startTimer();
    </script>

 <script type="text/javascript">
        function confirmation() {
            return confirm('Are you sure you want to submit? it is irreversible!');
        }
    </script>

    </body>

</html>