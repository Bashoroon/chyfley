<?php include 'header.php';?>
<body>

<?php include 'navigationMenu.php';

    $session = $_GET['session'];
$term = $_GET['term'];
$class = $_GET['class'];
   ?>

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Data Table</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $session;?></a></li>
                            <li class="breadcrumb-item active"><?php print $class;?></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

           
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">View Report Sheet</h4>
                           

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                     <?php
                                             $sqlstudentz = $conn->query ("SELECT * from promotedstudent where session = '$session' and class = '$class' and deleteStatus != 1 ");
                                                          
                                                    ?>
                                <tr>
                                    <th>Name</th>
                                    <th>First Term</th>
                                    <th>Second Term</th>
                                    <th>Third Term</th>
                                    
                                </tr>
                                </thead>


                                <tbody>

                                    <?php while ($studentz = mysqli_fetch_array($sqlstudentz)){

                                         $sqlStudentReportFirst =  $conn->query("SELECT * from studentscores where session = '$session' and term ='First' and class = '$class' and admissionNo='".$studentz['admissionNo']."'");
                                                 $studentReportFirst = mysqli_fetch_array($sqlStudentReportFirst);

                                         $sqlStudentReportSecond =  $conn->query("SELECT * from studentscores where session = '$session' and term ='Second' and class = '$class' and admissionNo='".$studentz['admissionNo']."'");
                                                 $studentReportSecond = mysqli_fetch_array($sqlStudentReportSecond);
                                                 $admissionNo= $studentz['admissionNo'];


                                         $sqlStudentReportThird =  $conn->query("SELECT * from studentscores where session = '$session' and term ='Third' and class = '$class' and admissionNo='".$studentz['admissionNo']."'");
                                                 $studentReportThird = mysqli_fetch_array($sqlStudentReportThird);

                                                   $sqlfindStudentName = $conn->query ("SELECT * from studentusers where admissionNo='".$studentz['admissionNo']."'");

                                        $findStudentName = mysqli_fetch_array($sqlfindStudentName);

                                               
                                        ?>
                                <tr>
                                     
                                    <td><?php print $findStudentName['surname'];?> <?php print $findStudentName['firstName'];?> <?php print $findStudentName['lastName'];?></td>
                                    <td><a href="ReportSheet.php?session=<?php print $studentReportFirst['session'];?>&class=<?php print $studentReportFirst['class'];?>&term=<?php print $studentReportFirst['term'];?>&admissionNo=<?php print $admissionNo;?>" target="_blank"><?php if ($studentReportFirst['term'] == "First"){ echo "view";}?></a></td>

                                     <td><a href="ReportSheet2.php?session=<?php print $studentReportSecond['session'];?>&class=<?php print $studentReportSecond['class'];?>&term=<?php print $studentReportSecond['term'];?>&admissionNo=<?php print $admissionNo;?>" target="_blank"><?php if ($studentReportSecond['term'] == "Second"){ echo "view";}?></a></td>

                                      <td><a href="ReportSheet2.php?session=<?php print $studentReportThird['session'];?>&class=<?php print $studentReportThird['class'];?>&term=<?php print $studentReportThird['term'];?>&admissionNo=<?php print $admissionNo;?>" target="_blank"><?php if ($studentReportThird['term'] == "Third"){ echo "view";}?></a></td>
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
   <?php include 'footer.php';?>
      <?php include 'modal.php';?>
</body>

</html>