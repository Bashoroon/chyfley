<?php include 'call_php_function.php';
include 'header.php';
?>

<body>

    <?php include 'navigationMenu.php';
    $session = $_GET['session'];
    $class = $_GET['class'];
    $sessionz = $_GET['e'];

    ?>


    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $class; ?> STUDENTS</h4>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <h5 class="breadcrumb-item"><a href="javascript:void(0);"><?php print $session; ?></a></h5>

                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <form id="promoteForm" action="promote-student.php" method="">

                <div class="row">
                    <div class="col-lg-6 col-12 col-md-12 col-sm-12 col-xm-12">
                        <div class="form-group">
                            <label class="control-label">From Session</label>
                            <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                                <option value="">Select a session</option>
                                <?php foreach($sessions as $sessionz){?>
                                   <option value="<?php print $sessionz['session']; ?>"><?php print $sessionz['session']; ?></option>
                               <?php } ?>
                            </select>

                        </div>
                    </div>


                    <div class="col-lg-6 col-12 col-md-12 col-sm-12 col-xm-12">
                        <div class="form-group">
                            <label class="control-label">From Class</label>
                            <select id="classSelect" type="text" required="required" a value="" class="form-control" name="class">
                                <option value="">Select a class</option>
                                <?php    if ($nameFound['class'] !== "") {
                                           foreach($teacherClasses as $teacherClass) {
                                                $classTeachers = explode(',', $teacherClass['class']);
                                                foreach ($classTeachers  as $classTeacher) {
                                        ?>
                                                 <option value="<?php echo $classTeacher; ?>"><?php echo $classTeacher; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            foreach($classes as $class)  {
                                                ?>
                                             <option value="<?php echo $class['class']; ?>"><?php echo $class['class']; ?></option>
                                     <?php
                                            }
                                        }
                                        ?>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary" style="float: right;" id="submit" name="load-student" class="btn-submit">Check</button>

                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Student Data</h4>
                            <?php if (isset($_GET['e'])) {;
                                echo "No student registered for this $sessionz, $term, and $class.";
                            } ?>

                            <table id="promote-studsent" class="table table-striped table-bordered dt-responsive nowrap" stsyle="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>


                                        <th>Admission No</th>
                                        <th>Names</th>
                                        <th><input type="checkbox" class="checkAll" name="id[]">Select All</th>

                                    </tr>

                                </thead>
                                <?php
                                if (isset($_GET['session']) && isset($_GET['class'])) {



                                ?>

                                    <tbody>
                                        <form action="processPromote.php" method="POST">
                                            <?php foreach ($students as $student) {
                                                $studentName = $studentController->student_name($student['admissionNo']);
                                            ?>
                                                <tr>

                                                    <td><?php print $student['admissionNo']; ?></td>
                                                    <td><?php print $studentName['surname'] . ' ' . $studentName['firstName'] . ' ' . $studentName['lastName']; ?></td>
                                                    <td><input type="checkbox" name="id[]" value="<?php print $student['admissionNo']; ?>">
                                                    </td>


                                                </tr>
                                        <?php }
                                        } else {
                                            print "<h6 style='color:red;'>Please choose session and class to promote from</h6>";
                                        } ?>

                                    </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            <center>
                <div class="row">
                    <div class="col-lg-6 col-12 col-md-12 col-sm-12 col-xm-12">
                        <div class="form-group">
                            <label class="control-label">To Session</label>
                            <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                                <option value="">Select a session</option>
                                <?php foreach($sessions as $sessionz){?>
                                   <option value="<?php print $sessionz['session']; ?>"><?php print $sessionz['session']; ?></option>
                               <?php } ?>
                            </select>

                        </div>
                    </div>


                    <div class="col-lg-6 col-12 col-md-12 col-sm-12 col-xm-12">
                        <div class="form-group">
                            <label class="control-label">To Class</label>
                            <select id="classSelect" type="text" required="required" a value="" class="form-control" name="class">
                                <option value="">Select a class</option>
                                <?php    if ($nameFound['class'] !== "") {
                                           foreach($teacherClasses as $teacherClass) {
                                                $classTeachers = explode(',', $teacherClass['class']);
                                                foreach ($classTeachers  as $classTeacher) {
                                        ?>
                                                 <option value="<?php echo $classTeacher; ?>"><?php echo $classTeacher; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            foreach($classes as $class)  {
                                                ?>
                                             <option value="<?php echo $class['class']; ?>"><?php echo $class['class']; ?></option>
                                     <?php
                                            }
                                        }
                                        ?>
                            </select>

                        </div>
                    </div>

                    <div class="col-lg-6 col-12 col-md-12 col-sm-12 col-xm-12">
                    <center> <button class="btn btn-primary"  id="submit" name="load-student" class="btn-submit">Promote</button></center>

                    </div>
                </div>
                </form>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>

</body>

</html>
<script type="text/javascript">
    $(".checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('promoteForm');
        var sessionSelect = document.getElementById('sessionSelect');
        var classSelect = document.getElementById('classSelect');

        function triggerFormSubmission() {
            form.submit();
        }

        sessionSelect.addEventListener('change', triggerFormSubmission);
        classSelect.addEventListener('change', triggerFormSubmission);
    });
</script>