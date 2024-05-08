<!DOCTYPE html>
<html lang="en">
<?php include 'db.php';?>
<head>
    <?php include 'header.php';?>

</head>

<body>

  <?php include 'navigationMenu.php';?>

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
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>delete</th>
                                    
                                </tr>
                                </thead>

<?php $selectTeacher = $conn->query ("select * from users where status='1'");?>
                                <tbody>
                               <?php while ($teacher = mysqli_fetch_array($selectTeacher)){;?>
                                <tr>
                                    <td><?php print $teacher['name'];?></td>
                                    <td><?php print $teacher['username'];?></td>
                                    <td><?php print $teacher['password'];?></td>
                                    <td><?php print $teacher['role'];?></td>
                                   <td><button class="bg-danger"><a href="deleteTeacher.php?id=<?php print $teacher['id']; ?>" onclick="return confirmation()">Delete</a></button><button ><a href="modifyTeacher.php?id=<?php print $teacher['id']; ?>">Edit</a></button></td>
                                </tr>
                               <?php }?>
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