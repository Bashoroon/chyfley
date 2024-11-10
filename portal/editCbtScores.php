<?php include 'call_php_function.php';
include 'header.php'; ?>

<body>

    <?php include 'navigationMenu.php';
    $id = $_GET['id'];
    $admissionNo = $_GET['admissionNo'];
    $sqlFetchTErmSession = $conn->query("SELECT * from studentscores where id='$id'");
    $fetchTErmSession = mysqli_fetch_array($sqlFetchTErmSession);
    $session = $fetchTErmSession['session'];
    $term = $fetchTErmSession['term'];
    $class = $fetchTErmSession['class'];
    $subject = $fetchTErmSession['subject'];

    ?>

    </div>
    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $subject; ?> SCORE SHEET</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $session; ?></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $term; ?></a></li>
                            <li class="breadcrumb-item active"><?php print $class; ?></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            

                            <table id="score-ssheet" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Test</th>
                                        <th>Second Test</th>
                                        <th>Exam</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <?php



                                ?>
                                <tbody>

                                    <?php



                                    $cbtScore = $cbtController->edit($id);

                                    $studentName = $studentController->student_name($cbtScore['admissionNo']);


                                    ?>
                                    <tr>
                                        <form  method="POST">
                                            <input type="hidden" name="id" value="<?php print $id; ?>">
                                            <td><?php print $studentName['surname']; ?> <span><?php print $studentName['firstName']; ?> </span><span class="co-name"><?php print $studentName['lastName']; ?></span></td>
                                            <input type="hidden" value="<?php print $cbtScore['admissionNo']; ?>" name="admissionNo">
                                            <td><input type="number" class="form-control" max="20" name="test" value="<?php print $cbtScore['test']; ?>"></td>
                                            <td><input type="number" class="form-control" max="20" name="testTwo" value="<?php print $cbtScore['test_two']; ?>"></td>
                                            <td><input type="number" class="form-control" name="exam" value="<?php print $cbtScore['exam']; ?>" max="60" ></td>


                                            <td><button type="submit" name="update-cbt-score" class="btn btn-secondary">Update</button>
                                        </form>
                                    </tr>
                                    <?php  ?>
                                </tbody>
                            </table>
                        </div>
                      
 -->


                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div>
    <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

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