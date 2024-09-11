<?php include 'call_php_function.php';
include 'header.php';
?>

<body>


    <?php
    $session = $_GET['session'];
    $term = $_GET['term'];
    $class = $_GET['class'];




    ?>
    <?php include 'navigationMenu.php';

    ?>

    <!-- header-bg -->
    <div class="main main-app p-3 p-lg-4">
        <div class="wrapper">
            <div class="container">
                <form action="examination-status.php" method="GET">

                    <div class="row">
                    <div class="col-lg-3 col-12 col-md-12 col-sm-12 ">
                            <div class="form-group">
                                <label class="control-label"> Session</label>
                                <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                                    <option value="">Select a session</option>
                                    <?php foreach ($sessions as $sessionz) { ?>
                                        <option value="<?php print $sessionz['session']; ?>"><?php print $sessionz['session']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>


                        <div class="col-lg-3 col-12 col-md-12 col-sm-12 ">
                            <div class="form-group">
                                <label class="control-label"> Class</label>
                                <select id="classSelect" type="text" required="required" a value="" class="form-control" name="class">
                                    <option value="">Select a class</option>
                                    <?php if ($nameFound['class'] !== "") {
                                        foreach ($teacherClasses as $teacherClass) {
                                            $classTeachers = explode(',', $teacherClass['class']);
                                            foreach ($classTeachers  as $classTeacher) {
                                    ?>
                                                <option value="<?php echo $classTeacher; ?>"><?php echo $classTeacher; ?></option>
                                            <?php
                                            }
                                        }
                                    } else {
                                        foreach ($classes as $class) {
                                            ?>
                                            <option value="<?php echo $class['class']; ?>"><?php echo $class['class']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-3 col-12 col-md-12 col-sm-12 ">
                            <div class="form-group">
                                <label class="control-label">Term</label>
                                <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                    <option value="">Select a term</option>

                                    <option value="First">First Term</option>
                                    <option value="Second">Second Term</option>
                                    <option value="Third">Third Term</option>


                                </select>

                            </div>
                           
                        </div>
                        <div class="col-lg-3 col-12 col-md-12 col-sm-12 ">
                            <div class="form-group">
                                 <label class="control-label">Exam type</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="examType">
                                 <option value="">Select a exam type</option>
                                    
                                    <option value="First">First Test</option>
                                    <option value="Second">Second Test</option>
                                    <option value="Exam">Exam</option>
                                 </select>

                             </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary" name="" style="float: right;" id="submit" class="btn-submit">Load Exams</button>

                        </div>
                    </div>
                </form>
                <!-- Page-Title -->

                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Change Examination Status</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Session <?php print $_GET['session']; ?></a></li>
                                <li class="breadcrumb-item active"><?php print $_GET['term']; ?></li>
                            </ol>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title mb-4"></h4>

                                    <div class="table-responsive">
                                        <table id="inpustScore" class="table table-hover">
                                            <thead>
                                                <tr>

                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Class</th>

                                                    <th scope="col">Status</th>

                                                    <th scope="col">Start time</th>

                                                    <th scope="col">End Time</th>
                                                    <th scope="col">change status</th>





                                                </tr>

                                            </thead>
                                            <tbody><?php


                                                    $sqlQues = $conn->query("select * from questionbank where session = '" . $_GET['session'] . "' and class = '" . $_GET['class'] . "' and term = '" . $_GET['term'] . "' and exam_type='".$_GET['examType']."' group by subject ");
                                                    while ($ques = mysqli_fetch_array($sqlQues)) {
                                                        $status = $ques['status'];

                                                    ?>
                                                    <tr>



                                                        <td>
                                                            <?php print $ques['subject']; ?>
                                                        </td>

                                                        <td>

                                                            <?php print $ques['class']; ?>
                                                        </td>
                                                        <td>

                                                            <?php print $ques['status']; ?>
                                                        </td>
                                                        <td>
                                                            <?php print $ques['startDate']; ?>


                                                        </td>
                                                        <td>
                                                            <?php print $ques['endDate']; ?>
                                                        </td>


                                                        <td>
                                                            <form action="processExamStatus.php" method="POST">
                                                                <input type="datetime-local" name="startDate" id="inputstartDate" class="form-control" value="<?php print $ques['startDate']; ?> " require><br>

                                                                <input type="datetime-local" name="endDate" id="inputendDate" class="form-control" value="<?php print $ques['endDate']; ?> " require><br>
                                                                <input type="number" name="duration" placeholder="duration" class="form-control" value="" require><br>

                                                                <select type="text" required="required" value="" class="form-control" name="status">
                                                                    <option value="">Select a Status</option>

                                                                    <option value="closed">Close</option>
                                                                    <option value="opened">Open</option>
                                                                    <option value="pending">Pending</option>
                                                                    <option value="correction">Correction</option>

                                                                </select><br>
                                                                <input type="hidden" value="<?php print $ques['subject']; ?>" name="subject">
                                                                <input type="hidden" value="<?php print $_GET['class']; ?>" name="class">
                                                                <input type="hidden" value="<?php print $session; ?>" name="session">
                                                                <input type="hidden" value="<?php print $_GET['term']; ?>" name="term">
                                                                <input type="hidden" value="<?php print $_GET['examType']; ?>" name="examType">

                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </form>
                                                        </td>

                                                    </tr>

                                                <?php } ?>



                                            </tbody>
                                        </table>





                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- end container-fluid -->
            </div>
        </div>
        <!-- end wrapper -->
        <?php require_once("footer.php"); ?>
        <?php include 'modal.php'; ?>

        <!-- Footer -->
        <script>
            function clearform() {
                document.getElementById("surname").value = "";
                document.getElementById("firstName").value = "";
                document.getElementById("lastName").value = "";
                document.getElementById("test").value = "";
                document.getElementById("exam").value = "";

            }
        </script>

</body>

</html>