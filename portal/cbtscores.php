<?php include 'header.php';
$session = $_GET['session'];
$term = $_GET['term'];
$class = $_GET['class'];
$subject = $_GET['subject'];

?>

<body>
    <!-- Navigation Bar-->

    <?php require_once 'navigationMenu.php'; ?>
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $subject; ?> CBT SCORE SHEET</h4>
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



                            <table id="score-sheet" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Admission</th>
                                        <th>Name</th>
                                        <th>Test</th>
                                       
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <?php

                                $sqlstudentz = $conn->query("SELECT * from promotedstudent where session = '$session' and class = '$class' and deleteStatus != 1");

                                ?>
                                <tbody>

                                    <?php while ($studentz = mysqli_fetch_array($sqlstudentz)) {;
                                        $admissionNo = $studentz['admissionNo'];
                                        $sqlstudentzName = $conn->query("SELECT * from studentusers where admissionNo='$admissionNo'");
                                        $studentzName = mysqli_fetch_array($sqlstudentzName);

                                        $sqlStudentScore =  $conn->query("SELECT * from cbtscores where session = '$session' and term = '$term' and class = '$class' and admissionNo='$admissionNo' and subject='$subject'");
                                        $studentScore = mysqli_fetch_array($sqlStudentScore);
                                       
                                        $emptyTest = $studentScore['test'] ?? '';
                                        
                                    ?>
                                        <tr id="">
                                            <td><?php print $studentzName['admissionNo']; ?></td>
                                            <td><?php print $studentzName['surname']; ?> <span><?php print $studentzName['firstName']; ?> </span><span class="co-name"><?php print $studentzName['lastName']; ?></span></td>
                                            <input type="hidden" value="<?php print $studentScore['admissionNo']; ?>" name="admissionNo">
                                            <?php
                                            if ($emptyTest == "") {
                                                echo "<td>-</td>";
                                            } else { ?>
                                                <td><?php print $studentScore['test']; ?></td>
                                            <?php } ?>

                                           

                                           
                                            <td> <?php if (!isset($studentScore['admissionNo'])) {
                                                    } else { ?><button class="bg-danger"><a href="deleteCbtScores.php?id=<?php print $studentScore['id']; ?>" onclick="return confirmation()">Delete</a></button><?php } ?>


                                        </tr>
                                    <?php } ?>
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