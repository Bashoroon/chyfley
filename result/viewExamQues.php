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
</style>
<?php $sqlCheckIfDoneBefore = $conn->query("SELECT * FROM cbtscores WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class= '" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "' and admissionNo= '$user' ");
$done = mysqli_num_rows($sqlCheckIfDoneBefore);
if ($done > 0) { ?>

    <div class="wrapper-page">
        <div class="card card-pages shadow-none">
            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <a href="login.php" class="logo logo-admin"><img src="assets/images/report_logo.png" alt="CHYLEY LOGO" height="60"></a>
                </div>
                <center>
                    <div class="congratulation">
                        <div class="icon">
                            <span class="material-icons"></span>
                        </div>
                        <h2>OOPS!</h2>
                        <p>This Exam has been completed by you! Kindly contact the admin for reseat </p>
                        <button class=" btn btn-danger"> <a href="logout.php" class="">Log out</a></button>
                    </div>
                </center>


            </div>
        </div>

    </div>
<?php } else { ?>

    <body>
        <?php
        $recordsPerPage = 1; // Number of records to display per page
        $currentpage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the query string
        $offset = ($currentpage - 1) * $recordsPerPage; // Calculate the offset for the SQL query

        $sqlQuestions = $conn->query("SELECT * FROM questionbank WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class= '" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "'");
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
    $questionIndex = 0; // Initialize question index
    while ($questions = mysqli_fetch_array($sqlQuestions)) {
        $startDate = $questions['startDate'];
        $endDate = $questions['endDate'];
        $duration = $questions['duration'];
        $sqlCheck = $conn->query("SELECT * FROM studentanswers WHERE quesid='" . $questions['quesid'] . "' AND session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class= '" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "' and admissionNo= '$user' ");
        $checked = mysqli_fetch_array($sqlCheck);
        $questionIndex++; // Increment question index
    ?>
        <div class="tab">
            <div class="text-center">
                <img src="assets/images/exam_logo.png" height="auto" width="80%" alt="" >
            </div>

            <div class="text-center">
                <?php if ($student['passport'] == "") { ?><img src="../portal/passport/images.jfif" alt="" class="img-responsive" style="border-radius: 50%; width: 20vw;"><?php } else { ?><img srcset="../portal/passport/<?php print $student['passport']; ?>" alt="" class="img-responsive" style="border-radius: 50%; width: 20vw;"><?php } ?>
                <h5 class="text-dark"><?php print $student['surname']; ?> <?php print $student['firstName']; ?> <?php print $student['lastName']; ?><h5>
                        <h6 class="text-dark"> <?php print $student['admissionNo']; ?></h6>
                        <?php print $founded['class']; ?>
            </div>

             <div class="mt-3">
                            <h3><?php print $_GET['subject']; ?></h3>
                        </div>
                        <div class="question"><?php echo $questions['question']; ?></div>
                        <input type="hidden" id="quesid<?php echo $questionIndex; ?>" value="<?php echo $questions['quesid']; ?>" name="quesid">
                        <input type="hidden" id="answer<?php echo $questionIndex; ?>" value="<?php echo $questions['answer']; ?>" name="answer">
                        <div class="form-check">
                            <input class="form-check-input" value="A" type="radio" name="studentAns<?php echo $questionIndex; ?>" id="studentAns1<?php echo $questionIndex; ?>" <?php if ($checked['studentAnswer'] == "A") {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                } ?>>
                            <label class="form-check-label" for="studentAns1<?php echo $questionIndex; ?>">
                                <?php echo $questions['optionA']; ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="B" type="radio" name="studentAns<?php echo $questionIndex; ?>" id="studentAns2<?php echo $questionIndex; ?>" <?php if ($checked['studentAnswer'] == "B") {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                } ?>>
                            <label class="form-check-label" for="studentAns2<?php echo $questionIndex; ?>">
                                <?php echo $questions['optionB']; ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="C" type="radio" name="studentAns<?php echo $questionIndex; ?>" id="studentAns3<?php echo $questionIndex; ?>" <?php if ($checked['studentAnswer'] == "C") {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                } ?>>
                            <label class="form-check-label" for="studentAns3<?php echo $questionIndex; ?>">
                                <?php echo $questions['optionC']; ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="D" type="radio" name="studentAns<?php echo $questionIndex; ?>" id="studentAns4<?php echo $questionIndex; ?>" <?php if ($checked['studentAnswer'] == "D") {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                } ?>>
                            <label class="form-check-label" for="studentAns4<?php echo $questionIndex; ?>">
                                <?php echo $questions['optionD']; ?>
                            </label>
                        </div>
                        
                        

        </div>
    <?php } ?>
    <div id="result"></div>
<br><br>
    <div style="overflow:auto;">
        <div style="float:left;">
            <center>
                <div class="pagination text-center">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center flex-wrap">
                            <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <?php
                            $sqlQuestions = $conn->query("SELECT * FROM questionbank WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class='" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "'");
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
                              <div class="text-center mt-3">
        <button type="submit" class="btn btn-success">Submit All Answers</button>
    </div>
                        </form>
                    </div>

        </div>
       
    <?php } ?>
    <!-- Circles which indicate the steps of the form: -->


    <?php include '../portal/footer.php'; ?>


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
                        answer: answer
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
               $("#result").html("Error in connection.Please check your connection: " + textStatus);
           }
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