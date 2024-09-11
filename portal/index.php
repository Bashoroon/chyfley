<?php include 'call_php_function.php';
include 'header.php';?>

<body>
    <!-- Navigation Bar-->

    <?php require_once 'navigationMenu.php'; ?>
    <!-- End Navigation Bar-->
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item active"> </li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="alert alert-custom alert-<?php echo $responseType === 'success' ? 'success' : 'danger'; ?> alert-slide-in" role="alert">
    <?php echo $response; ?>
</div>
            <?php $sqlStudentNo  = $conn->query("SELECT * from studentusers ");
            $studentNo = mysqli_num_rows($sqlStudentNo);

            $sqlTeachertNo  = $conn->query("SELECT * from users ");
            $teacherNo = mysqli_num_rows($sqlTeachertNo);
            ?>

            <?php
            $role = $_SESSION['role'];
            if ($role == "Teacher") { ?>
                <div class="row">

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                </div>
                                <div>

                                    <h5 class="font-16"><a href="inputScore.php" class=" waves-effect waves-light" >INPUT SCORE </a></h5>
                                </div>
                                <h5 class="mt-4"><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".inputScore">INPUT SCORE </a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">Record Score<span class="float-right">100%</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16"><a href="broadSheet2.php" class=" waves-effect waves-light" >BROAD SHEET </a></h5>
                                </div>
                                <h5 class="mt-4"><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".checkbroadsheet2">BROAD SHEET </a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">Broad Sheet</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16"><a href="score-sheet.php" class=" waves-effect waves-light"> VIEW SCORE SHEET </a></h5>
                                </div>
                                <h5 class="mt-4"><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".checkscoresheet">SCORE SHEET </a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">Score Sheet<span class="float-right">68%</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16"><a href="view-student-report.php" class=" waves-effect waves-light">VIEW STUDENT REPORT</a></h5>
                                </div>
                                <h5 class="mt-4"><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".student-report">STUDENT REPORT</a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">Student Report<span class="float-right">68%</span></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                </div>
                                <div>

                                    <h5 class="font-16"><a href="E-note.php" class=" waves-effect waves-light">ADD E-NOTE </a></h5>
                                </div>
                                <h5 class="mt-4"><a href="E-note.php" class=" waves-effect waves-light">ADD E-NOTE </a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">Add E-note<span class="float-right">100%</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16"><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".viewEnote">VIEW E-NOTE </a></h5>
                                </div>
                                <h5 class="mt-4"><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".viewEnote">VIEW E-NOTE </a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">View E-Note by Class</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16"><a href="assignment.php">ADD ASSIGNMENT</a></h5>
                                </div>
                                <h5 class="mt-4"><a href="assignment.php">ADD ASSIGNMENT</a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">Add Assignment<span class="float-right">100%</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-buffer bg-danger text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16"><a href="comment-attendance.php" class=" waves-effect waves-light">COMMENT</a></h5>
                                </div>
                                <h5 class="mt-4"><a href="comment-attendance.php" class=" waves-effect waves-light" >COM/ATT</a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">Comment & Student Attendance<span class="float-right">100%</span></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                </div>
                                <div>

                                    <h5 class="font-16"><a href="" target="_blank" class=" waves-effect waves-light " data-toggle="modal" data-target=".examQuestion">ADD CBT QUESTION</a></h5>
                                </div>
                                <h5 class="mt-4"><a href="" target="_blank" class=" waves-effect waves-light " data-toggle="modal" data-target=".examQuestion">ADD CBT QUESTION</a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">Add CBT Questions<span class="float-right">100%</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16"><a href="cbtscores.php" class=" waves-effect waves-light" >CBT SCORES</a></a></h5>
                                </div>
                                <h5 class="mt-4"><a href="cbtscores.php" class=" waves-effect waves-light" >CBT SCORES</a></h5>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-2 mb-0">CBT SCores</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  } ?>
            <?php if ($role == "Admin" || $role == "Sub") { ?>

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12  col-sm-12 col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Add Student</h4>
                                


                                <form method="POST" id="adsmission">
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="form-group">
                                                        <label class="control-label">Admission Number</label>
                                                        <?php
                                                        $year = date("Y");
                                                        ?>
                                                        <input type="text" value="CHS/<?php echo substr($year, 2); ?>/" class="form-control" name="admissionNo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Surname</label>
                                                        <input id="demo1" type="text" required="required" class="form-control" name="surname">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label">First Name</label>
                                                        <input id="demo1" type="text" required="required" class="form-control" name="firstName">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Middle Name</label>
                                                        <input id="demo1" type="text" class="form-control" name="lastName">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Session</label>
                                                        <select id="demo1" type="text" name="session" required="required" value="" class="form-control">
                                                            <option value="">Select a session</option>
                                                            <?php foreach ($sessions as $sessionz) { ?>
                                                                <option value="<?php print $sessionz['session']; ?>"><?php print $sessionz['session']; ?></option>
                                                            <?php } ?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Class</label>
                                                        <select id="demo1" type="text" required="required" value="" class="form-control" name="class">
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

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Gender</label>
                                                        <select id="demo1" type="text" required="required" value="" class="form-control" name="gender">
                                                            <option>Select a gender</option>


                                                            <option value="M">Male</option>
                                                            <option value="F">Female</option>

                                                        </select>

                                                    </div>
                                                </div>

                                            </div>
                                            <button type="submit" name="add-student" class="btn btn-primary" style="float: right;">Add Student</button>
                                            <div id="result_screen" style="font-size: 20px; font-weight: bold; display: none;" class="alert alert-success"></div>
                                        </div>
                                    </div>
                                </form>

                                <center>
                                    <h5>OR</h5>
                                </center>
                                <form action="uploadStudent.php" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="control-label">Session</label>
                                                <select id="demo1" type="text" name="session" class="form-control" required="required">

                                                    <option value="">Select a session</option>
                                                    <?php foreach ($sessions as $sessionz) { ?>
                                                        <option value="<?php print $sessionz['session']; ?>"><?php print $sessionz['session']; ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <label for="upload">Upload a CSV</label>
                                            <input type="file" class="form-control" name="file" id="file" accept=".xls,.xlsx" required="required">

                                        </div>
                                        <button type="submit" id="submit" name="upload" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>


                    <div class="col-xl-6 col-lg-6 col-12 col-sm-12 col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Add Teacher</h4>

                                <?php if (isset($_GET['teacher-added'])) {
                                    echo "<h6>Mr/Mrs ";
                                    print $_GET['teacher-added'];
                                    echo " added as a staff<h6>";
                                } ?>
                                <h4>
                                    <div id="showteacher" class="bg bg-success"></div>
                                </h4>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Teacher's Name</label>*
                                                    <form action="" method="POST" id="AddTeadcher">
                                                        <input id="demo1" type="text" required="required" value="" class="form-control" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Username</label>*
                                                    <input id="demo1" type="text" required="required" value="" class="form-control" name="username">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Teacher's Email</label>
                                                    <input id="demo1" type="email" value="" class="form-control" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>*
                                                    <input id="demo1" type="password" required="required" value="" class="form-control" name="password">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Role</label>*
                                                    <select id="" type="text" class="form-control" name="role">
                                                        <option value="">Select Role</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Sub">Sub-Admin</option>
                                                        <option value="Teacher">Teacher</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Assign Class</label>*
                                                    <select id="assignClass" name="class[]" type="text" class="form-control" name="role" multiple>
                                                        <option value="">Select a class</option>
                                                            <?php  foreach ($classes as $class) {
                                                                    ?>
                                                                    <option value="<?php echo $class['class']; ?>"><?php echo $class['class']; ?></option>
                                                            <?php  }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Assign Subject</label>*
                                                    <select id="assignSub" name="subject[]" required="required" class="form-control" multiple>
                                                        <option value="">Select a subject</option>
                                                        <?php
                                                        foreach($subjects as $subject){?>
                                                            <option value="<?php print $subject['subject']; ?>"><?php print $subject['subject']; ?></option>
                                                    <?php }?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" name="add-teacher" class="btn btn-primary" style="float: right;">Save</button>
                                        <span  id="result_screen"></span>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    <?php } ?>
    </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
<?php include 'modal.php'; ?>
<script type="text/javascript">
    $(function() {

        $('#admission').on('submit', function(e) {

            e.preventDefault();

            $.ajax({
                type: 'post',
                url: 'processAdmission.php',
                data: $('#admission').serialize(),
                success: function(data) {
                    $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //=== Show Success Message==
                    // alert("successful");
                    $("#admission").trigger("reset");
                },
                error: function(data) {
                    $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //===Show Error Message====
                    // alert("Fail");
                    $("#admission").trigger("reset");
                }

            });

        });

    });


    $(function() {

        $('#AddTeacher').on('submit', function(e) {

            e.preventDefault();

            $.ajax({
                type: 'post',
                url: 'processAddTeacher.php',
                data: $('#AddTeacher').serialize(),
                success: function(data) {
                    $("#result_screenT").text(data).show("slow").delay(5000).hide("slow"); //=== Show Success Message==
                    // alert("successful");
                    $("#AddTeacher").trigger("reset");
                },
                error: function(data) {
                    $("#result_screenT").text(data).show("slow").delay(5000).hide("slow"); //===Show Error Message====
                    // alert("Fail");
                    $("#AddTeacher").trigger("reset");
                }

            });

        });

    });
</script>



</html>