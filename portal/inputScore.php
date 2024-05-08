<?php include 'header.php';?>
<body>
 

<?php include 'header.php';
 $session = $_GET['session'];
$term = $_GET['term']; 
$class = $_GET['class'];
$subject = $_GET['subject'];



?>
<?php include 'navigationMenu.php';

?>

    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $subject;?></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Session <?php print $session;?></a></li>
                            <li class="breadcrumb-item active"><?php print $term;?></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
    
            <!-- START ROW -->
             <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4"></h4>
                                <form action="processScore.php" method="POST">
                                    <div class="table-responsive">
                                        <table id="inpustScore" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Test/Exam</th>
                                                    <th>CBT Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['session']) && isset($_GET['term']) && isset($_GET['class']) && isset($_GET['subject'])) {
                                                    $sqlStudent = $conn->query("SELECT * FROM promotedstudent WHERE session='$session' AND class='$class' AND deleteStatus != 1 ");
                                                    while ($student = mysqli_fetch_array($sqlStudent)) {
                                                         $sqlCbtScores = $conn->query("SELECT * FROM cbtscores WHERE session='$session' AND class='$class' and term= '$term' and admissionNo = '".$student['admissionNo']."' AND subject='$subject'");
                                                          $cbtScores = mysqli_fetch_array($sqlCbtScores);
                                                        $sqlfindStudentName = $conn->query("SELECT * FROM studentusers WHERE admissionNo = '".$student['admissionNo']."'");
                                                        $findStudentName = mysqli_fetch_array($sqlfindStudentName);
                                                        $admissionNo = $student['admissionNo'];
                                                        $sqlfindScore = $conn->query("SELECT * FROM studentscores WHERE admissionNo='$admissionNo' AND session='$session' AND term='$term' AND class='$class' AND subject='$subject'");
                                                        $found = mysqli_num_rows($sqlfindScore);
                                                        if ($found > 0) {
                                                        } else {
                                                ?>
                                                            <tr>
                                                                <input type="hidden" value="<?php print $student['admissionNo'];?>" name="admissionNo[]">
                                                                <td>
                                                                    <?php print $findStudentName['surname']; ?> <span><?php print $findStudentName['firstName']; ?></span><span> <?php print $findStudentName['lastName']; ?></span>
                                                                </td>
                                                                <td>
                                                                    <input style="width: 40px;" type="number" name="test[]" max="40">:<input style="width: 40px;" type="number" value="" name="exam[]" max="60"> 
                                                                </td>
                                                                <td><input type="text" readonly name= "cbtscore[]" value="<?php print $cbtScores['test'];?>"></td>
                                                            </tr>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                                <input type="hidden" value="<?php print $session;?>" name="session">
                                                <input type="hidden" value="<?php print $term;?>" name="term">
                                                <input type="hidden" value="<?php print $class;?>" name="class">
                                                <input type="hidden" value="<?php print $subject;?>" name="subject">
                                            </tbody>
                                        </table>
                                        <button type="submit" onClick="clearform();" class="btn btn-primary" style="float: right;">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
            <!-- END ROW -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->
<?php include 'footer.php';?>
<?php include 'modal.php';?>
    <!-- Footer -->
   <script>
        function clearform()
        {
            document.getElementById("surname").value="";
            document.getElementById("firstName").value="";
            document.getElementById("lastName").value="";
            document.getElementById("test").value="";
            document.getElementById("exam").value="";

        }
    </script>

</body>

</html>