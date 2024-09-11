<?php include 'call_php_function.php';
include 'header.php'; ?>

<body>

    <?php include 'navigationMenu.php'; ?>

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">

                </div>
                <!-- end row -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Teacher's Data</h4>
                            

                            <table id="teacher-detail" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                
                                <tbody>
                                    <?php 
                                        $no = 1;
                                    foreach ($staffs as $staff) {?>
                                        
                                        <tr>
                                            <td><?php print $no++;?></td>
                                            <td><?php print $staff['name']; ?></td>
                                            <td><?php print $staff['username']; ?></td>
                                            <td><?php print $staff['password']; ?></td>
                                            <td><?php print $staff['role']; ?></td>
                                            <td>
                                                <div class="btn-group mso-mb-2">
                                                    <a href="modifyTeacher.php?id=<?php print $staff['id']; ?>"> <button type="button" title="Edit profile" class="btn btn-primary waves-light waves-effect"><i class="fa fa-edit"></i></button></a>
                                                    <?php if ($role == "Admin") { ?>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="id" value="<?php print $staff['id']; ?>">
                                                            <button type="submit" class="btn btn-primary waves-light waves-effect delete" title="Delete" name="delete-staff" onclick="return confirmation()"><i class="far fa-trash-alt"></i></button>
                                                        </form>
                                                    <?php } ?>
                                                </div>
                                              
                                        </tr>
                                    <?php } ?>
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
    <?php include 'footer.php';
    include 'modal.php';
    ?>
</body>
<script type="text/javascript">
    function confirmation() {
        return confirm('Are you sure you want to do this?');
    }
</script>



</html>