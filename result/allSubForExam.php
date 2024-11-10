<?php include 'db.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php';
   
    $session = $_GET['session'];
    $term = $_GET['term'];
    $class = $_GET['class'];
    ?>
   <style>
     textarea {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: -moz-none;
            -o-user-select: none;
            user-select: none;
            overflow: auto;
        }
   </style>
</head>

<body>

    <div class="header-bg">
        <!-- Navigation Bar-->
      <?php include 'nav.php';?>
        <!-- End Navigation Bar-->

        <div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title"></h4>
                        </div>
                    </div>
                    <!-- end row -->
                </div>

                <div class="row">
                    <div class="col-lg-4 col-12">
                        <h5><b>SUBJECT</b></h5>
                        <div class="card m-b-30">
                            <div class="card-body">
                                <?php
                                date_default_timezone_set("Africa/Lagos");
                                $today = date("Y-m-d H:i:s");
                                $sqlQues = $conn->query("select * from questionbank where session='$session' and term='$term' and class='$class' and exam_type='".$_GET['examType']."' group by subject");
                                while ($ques = mysqli_fetch_array($sqlQues)) {
                                    $status = $ques['status'];
                                    $startDate = $ques['startDate'];
                                    $endDate = $ques['endDate'];
                                ?>
                                <div>
                                    <?php print $ques['subject']; ?>
                                    <?php if ($status == 'opened' & $today > $startDate & $today < $endDate) { ?>
                                        <a href="viewExamQues.php?session=<?php print $ques['session']; ?>&term=<?php print $ques['term']; ?>&class=<?php print $ques['class']; ?>&subject=<?php print $ques['subject']; ?>&examType=<?php print $ques['exam_type']; ?>" target="_blank">
                                            <button class="btn btn-success">VIEW QUESTIONS</button>
                                        </a>
                                    <?php } elseif ($status == 'pending') { ?>
                                        <button disabled="disabled" class="btn btn-danger">PENDING</button>
                                    <?php } ?>
                                     <?php  if ($status == 'correction') { ?>
                                   <a href="cbtCorrection.php?session=<?php print $ques['session']; ?>&term=<?php print $ques['term']; ?>&class=<?php print $ques['class']; ?>&subject=<?php print $ques['subject']; ?>&examType=<?php print $ques['exam_type']; ?>" target="_blank">
                                            <button class="btn btn-primary">VIEW CORRECTION</button>
                                        </a>
                                <?php } ?>
                                    <br>
                                </div><br>
                                <?php } if ($status == 'closed' || $today > $endDate) { ?>
                                    <button disabled="disabled" class="btn btn-danger">CLOSED</button>
                                <?php } ?>
                                
                               
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <h5>EXAMINATION INSTRUCTIONS</h5>
                        <div class="card m-b-30">
                            <div class="card-body">
                                <strong>
                                   <ul>
    <li><strong>Read Instructions:</strong> Carefully read all instructions provided on the computer screen before beginning the exam.</li>
    
    <li><strong>Technical Check:</strong> Ensure that your computer is functioning properly. Check the keyboard, mouse, and monitor for any issues.</li>
    
    <li><strong>Internet Connection:</strong> Ensure that your computer is connected to a stable internet connection throughout the exam.</li>
    
    <li><strong>Login:</strong> Log in to the exam platform using the provided username and password. Ensure that you enter the credentials correctly.</li>
    
    <li><strong>Environment:</strong> Choose a quiet and distraction-free environment for taking the exam. Avoid interruptions from family members or pets.</li>
    
    <li><strong>Seating Arrangement:</strong> Sit comfortably in your designated seat. Adjust the chair and monitor height for optimal viewing.</li>
    
    <li><strong>Time Management:</strong> Manage your time effectively during the exam. Allocate time for each section or question based on the total duration of the exam.</li>
    
    <li><strong>Equipment Check:</strong> Verify that all necessary equipment, such as calculators or reference materials, is available and functioning properly.</li>
    
    <li><strong>Avoid Distractions:</strong> Minimize distractions by closing unnecessary applications or browser tabs on your computer.</li>
    
    <li><strong>Honesty:</strong> Maintain academic integrity by refraining from cheating or using unauthorized aids during the exam.</li>
    
    <li><strong>Save Work:</strong> Save your progress regularly to prevent loss of data in case of technical issues.</li>
    
    <li><strong>Follow Instructions:</strong> Follow all instructions provided by the exam proctor or invigilator. Seek clarification if any instructions are unclear.</li>
    
    <li><strong>Review Responses:</strong> Review your answers before submitting the exam. Double-check for accuracy and completeness.</li>
    
    <li><strong>Stay Calm:</strong> Stay calm and focused throughout the exam. Take deep breaths if you feel anxious or stressed.</li>
    
    <li><strong>Submit Exam:</strong> Once you have completed all sections or questions, submit the exam as instructed. Confirm submission to ensure that your responses are recorded.</li>
    
    <li><strong>Logout:</strong> Logout from the exam platform and shut down your computer after completing the exam.</li>
    
    <li><strong>Feedback:</strong> Provide feedback on your exam experience to help improve the CBE process for future administrations.</li>
</ul>

                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end row -->

    </div>
    <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>
    
    

</body>

</html>
<script>
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
