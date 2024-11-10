<?php include 'call_php_function.php';
include 'header.php';

?>

<body>
    <?php include 'navigationMenu.php'; ?>

    <!-- header-bg -->

    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <?php if (isset($_GET['session'])) { ?>
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Attendance & Teacher's Comment</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Session <?php print $_GET['session']; ?></a></li>
                                <li class="breadcrumb-item active"><?php print $_GET['term']; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- end row -->
            <form action="comment-attendance.php" method="GET">

                <div class="row">
                    <div class="col-lg-4 col-12 col-md-12 col-sm-12 col-xm-12">
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


                    <div class="col-lg-4 col-12 col-md-12 col-sm-12 col-xm-12">
                        <div class="form-group">
                            <label class="control-label">Class</label>
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
                    <div class=" col-lg-4 col-12 col-md-12 col-sm-12 col-xm-12">
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
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary" name="load-student" style="float: right;" id="submit" class="btn-submit">Load Student</button>

                    </div>
                </div>
            </form>
            <!-- START ROW -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4"></h4>
                            <div class="table-responsive">

                                <table id="inpustScore" class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th scope="col">Student Name</th>

                                            <th scope="col">Attendance</th>
                                            <th>Comment</th>


                                        </tr>

                                    </thead>

                                    <tbody><?php


                                            if (isset($_GET['session']) and isset($_GET['term']) and isset($_GET['class'])) {
                                                foreach ($students as $student) {
                                                    $studentName = $studentController->student_name($student['admissionNo']);

                                                    $admissionNo = $student['admissionNo'];

                                                    //  check if the attendanc exists
                                                    $attendance = $attendanceController->show($admissionNo);
                                                    // all comments from the comment bank
                                                    $comments = $attendanceController->show_all();

                                            ?>
                                                <tr>
                                                    <form method="POST">
                                                        <input type="hidden" value="<?php print $student['admissionNo']; ?>" name="admissionNo[]">
                                                        <td style="width: 30%;">
                                                            <?php print $studentName['surname']; ?> <span><?php print $studentName['firstName']; ?></span><span> <?php print $studentName['lastName']; ?></span>
                                                        </td>
                                                        <?php $sqlComment = $conn->query("select * from teacherscomment"); ?>


                                                        <td><input class="form-control" value="<?php print $attendance['present']; ?>" type="number" name="present[]"></td>
                                                        <td>
                                                            <select class="form-control" name="comment[]">
                                                                <option value="" <?php if (empty($attendance['comment'])) { echo "selected";} ?>>Select teacher's comment</option>
                                                                <?php
                                                                // Check if $comments is an array and not empty
                                                                if (!empty($comments) && is_array($comments)) {
                                                                    foreach ($comments as $comment) {
                                                                        $selected = ($attendance['comment'] == $comment['comment']) ? "selected" : "";
                                                                ?>
                                                                        <option value="<?php echo htmlspecialchars($comment['comment']); ?>" <?php echo $selected; ?>>
                                                                            <?php echo htmlspecialchars($comment['comment']); ?>
                                                                        </option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>

                                                        </td>


                                                </tr>
                                            <?php  } ?>

                                            <input type="hidden" value="<?php print $_GET['session']; ?>" name="session">
                                            <input type="hidden" value="<?php print $_GET['term']; ?>" name="term">
                                            <input type="hidden" value="<?php print $_GET['class']; ?>" name="class">
                                        <?php }  ?>
                                    </tbody>
                                </table>
                                <button type="submit" name="submit-student-comment" class="btn btn-primary" style="float: right;">Save
                                </button></form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <form action="" method="POST">

                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Add Comment</label>
                                        <input type="text" name="comment" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="submit" class="btn btn-primary" name="add-comment" value="Submit">
                                    </div>

                                </div>
                            </form>
                            <p></p>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
            <!-- END ROW -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->
    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>
    <!-- Footer -->


</body>

</html>