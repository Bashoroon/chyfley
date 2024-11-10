<?php include 'header.php';
include 'call_php_function.php';
?>

<body>
    <?php include 'navigationMenu.php'; ?>

    <!-- header-bg -->
    <div class="main main-app p-3 p-lg-4">
        <section>
            <div class="wrapper">
                <div class="container-fluid">
                    <form action="previewQues.php" method="GET">

                        <div class="row">
                        <div class="col-lg-2 col-12 col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                                        <option value="">Select a session</option>
                                        <?php foreach ($sessions as $sessionz) { ?>
                                            <option value="<?php print $sessionz['session']; ?>"><?php print $sessionz['session']; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>


                            <div class="col-lg-2 col-12 col-md-12 col-sm-12 ">
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
                            <div class="col-lg-2 col-12 col-md-12 col-sm-12 ">
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
                            <div class="col-lg-2 col-12 col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <label class="control-label">Subject</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control" name="subject">
                                        <option value="">Select a subject</option>
                                        <?php
                                        if ($nameFound['subject'] !== "") {
                                            foreach ($teacherSubjects as $teacherSubject) {
                                                $subjectTeachers = explode(',', $teacherSubject['subject']);
                                                foreach ($subjectTeachers as $subjectTeacher) {
                                        ?>
                                                    <option value="<?php echo $subjectTeacher; ?>"><?php echo $subjectTeacher; ?></option>
                                                <?php
                                                }
                                            }
                                        } else {
                                            foreach ($subjects as $subject) { ?>
                                                <option value="<?php print $subject['subject']; ?>"><?php print $subject['subject']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-2 col-12 col-md-12 col-sm-12 ">
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
                                <button class="btn btn-primary" name="" style="float: right;" id="submit" class="btn-submit">Load Question</button>

                            </div>
                        </div>
                    </form>
                    <!-- Page-Title -->
                    <?php if (isset($_GET['session'])) { ?>
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title"><?php print $_GET['subject']; ?> Question Preview</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $_GET['session']; ?></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $_GET['term']; ?></a></li>
                                        <li class="breadcrumb-item active"><?php print $_GET['class']; ?></li>
                                    </ol>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">



                                    <table id="previewQues" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Question ID</th>
                                                <th>Questions</th>
                                                <th>Answers</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        if (isset($_GET['session']) and isset($_GET['term']) and isset($_GET['class'])) {
                                            $sqlques = $conn->query("SELECT * from questionbank where session = '" . $_GET['session'] . "' and class = '" . $_GET['class'] . "' and term = '" . $_GET['term'] . "' and subject = '" . $_GET['subject'] . "' and exam_type='".$_GET['examType']."'");

                                        ?>
                                            <tbody>

                                                <?php 
                                                 $no = 1;;
                                                while ($ques = mysqli_fetch_array($sqlques)) {

                                                ?>
                                                    <tr >
                                                        <td><?php print $no++; ?> </td>
                                                        <td><?php print $ques['question']; ?> </td>



                                                        <td><?php print $ques['answer']; ?></td>
                                                        <td>
                                                            <div class="btn-group mso-mb-2">

                                                                <a href="editExamQues.php?id=<?php print $ques['quesid']; ?>"> <button type="button" title="Edit profile" class="btn btn-primary waves-light waves-effect"><i class="fa fa-edit"></i></button></a>

                                                                <form action="deleteQues.php" method="GET">
                                                                    <input type="hidden" name="id" value="<?php print $ques['quesid']; ?>">
                                                                    <button type="submit" class="btn btn-primary waves-light waves-effect delete" title="Delete" name="delete-student" onclick="return confirmation()"><i class="far fa-trash-alt"></i></button>
                                                                    <input type="hidden" value="<?php print $_GET['session']; ?>" name="session">
                                                                    <input type="hidden" value="<?php print $_GET['term']; ?>" name="term">
                                                                    <input type="hidden" value="<?php print $_GET['class']; ?>" name="class">
                                                                    <input type="hidden" value="<?php print $_GET['subject']; ?>" name="subject">
                                                                    <input type="hidden" name="examType" id="inputsubject" class="form-control" value="<?php print $_GET['examType']; ?>">
                                                                </form>

                                                            </div>

                                                        </td>


                                                    </tr>
                                            <?php }
                                            } ?>
                                            </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

    </div>
    <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->
    </section>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>
    <script type="text/javascript">
        function confirmation() {
            return confirm('Are you sure you want to do this?');
        }
    </script>

</body>

</html>