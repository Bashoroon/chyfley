<?php include 'header.php';?>
<body>

<?php include 'navigationMenu.php';

 ?>
    <!-- header-bg -->
<?php 
$session = $_GET['session'];
$term = $_GET['term'];

 $sqlHowManyStudent = $conn->query ("SELECT * from clearance where session = '$session' and term = '$term'");
 $howManyStudent = mysqli_num_rows($sqlHowManyStudent);
?>
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><span style="text-transform: uppercase;"> <?php print $howManyStudent;?> STUDENT CLEARED FOR THIS <?php print $session;?> AND <?php print $term;?> TERM </span></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $session;?></a></li>
                            
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
                          }?>
                           
                            <table id="student-detail" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>   
                                    <th>Pin</th>
                                    <th>Name</th>
                                    
                                </tr>
                            
                                </thead>

                                <tbody>
                                    
<?php $sqlClearedStudent = $conn->query ("SELECT * from clearance where session = '$session' and term = '$term'");
        while ($clearedStudent = mysqli_fetch_array($sqlClearedStudent)){;
        $sqlFindStudent = $conn->query ("SELECT * from studentusers where admissionNo='".$clearedStudent['admissionNo']."'");
        $findStudent = mysqli_fetch_array($sqlFindStudent);
    ?>
                                <tr>
                                   
                                   
                                    <td><?php print $clearedStudent['admissionNo'];?></td>
                                    <td><?php print $findStudent['surname'];?> <?php print $findStudent['firstName'];?> <?php print $findStudent['lastName'];?> (<?php print $clearedStudent['class'];?>) </td>
                                    
                                </tr>
                                <?php  }?>
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
   <?php include 'footer.php';?>
<?php include 'modal.php';?>
</body>

</html>