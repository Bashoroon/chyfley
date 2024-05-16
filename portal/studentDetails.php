<?php include 'header.php'; ?>


<body>

    <?php include 'navigationMenu.php';

    ?>
    <!-- header-bg -->
    <?php
    $session = $_GET['s'];
    $class = $_GET['c'];
    $sessionz = $_GET['e'];
    $sqlHowManyStudent = $conn->query("SELECT * from promotedstudent where session = '$session' and class = '$class'");
    $howManyStudent = mysqli_num_rows($sqlHowManyStudent);
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">STUDENT IN <?php print $class; ?> (<?php print $howManyStudent; ?>)</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $session; ?></a></li>

                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Student Data</h4>
                            <?php if (isset($_GET['e'])) {;
                                echo "No student registered for this session $sessionz and $class.";
                            } ?>

                            <table id="student-detail" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Pin</th>
                                        <th>Name</th>
                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $sqlstudentz = $conn->query("SELECT * from promotedstudent where session = '$session' and class = '$class' and deleteStatus != 1");
                                    while ($studentz = mysqli_fetch_array($sqlstudentz)) {;
                                        $sqlFindStudent = $conn->query("SELECT * from studentusers where  admissionNo='" . $studentz['admissionNo'] . "'");
                                        $findStudent = mysqli_fetch_array($sqlFindStudent);
                                    ?>
                                        <tr>


                                            <td><?php print $studentz['admissionNo']; ?></td>
                                            <td><?php print $findStudent['surname']; ?> <?php print $findStudent['firstName']; ?> <?php print $findStudent['lastName']; ?> </td>
                                            <td>
                                                <div class="btn-group mso-mb-2">
                                                    <a href="#"><button title="view profile" type="button" class="btn btn-primary waves-light waves-effect"><i class="mdi mdi-account-circle"></i></button></a>
                                                    <a href="edit-student.php?id=<?php print $findStudent['id']; ?>"> <button type="button" title="Edit profile" class="btn btn-primary waves-light waves-effect"><i class="fa fa-edit"></i></button></a>
                                                    <?php if ($role == "Admin") { ?>
                                                    <a href="deleteStudent.php?id=<?php print $studentz['id']; ?>"><button type="button" class="btn btn-primary waves-light waves-effect delete" title="Delete"><i class="far fa-trash-alt"></button></a>
                                                    <?php }?>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>

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
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').click(function() {
            if (confirm("Are you sure you want to delete this row?")) {
                var id = $(this).parent().parent().attr('id');
                var data = 'id=' + id;
                var parent = $(this).parent().parent();

                $.ajax({
                    type: "POST",
                    url: "deleteStudent.php",
                    data: {
                        id: id
                    },
                    cache: false,

                    success: function() {
                        parent.fadeOut('slow', function() {
                            $(this).remove();
                        });
                    }
                });
            }
        });

    });
</script>

</html>