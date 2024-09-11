<?php include 'call_php_function.php';
 include 'header.php';
?>
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
            <form  action="view-student-report.php" method="GET">
               
               <div class="row">
               <div class="col-lg-6 col-6 col-md-12 col-sm-12 ">
                       <div class="form-group">
                           <label class="control-label">From Session</label>
                           <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                               <option value="">Select a session</option>
                               <?php foreach($sessions as $session){?>
                                   <option value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                               <?php } ?>
                           </select>

                       </div>
                   </div>
               
              
                   <div class="col-lg-6 col-6 col-md-12 col-sm-12 ">
                       <div class="form-group">
                           <label class="control-label">From Class</label>
                           <select id="classSelect" type="text" required="required" a value="" class="form-control" name="class">
                               <option value="">Select a class</option>
                               <?php foreach($classes as $class){?>
                                   <option value="<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                               <?php } ?>
                           </select>

                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-12">
                       <button class="btn btn-primary" name= "load-student" style="float: right;" id="submit" class="btn-submit">Load Student</button>

                   </div>
               </div>
            </form>
           
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">View Report Sheet</h4>
                           

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                     
                                <tr>
                                    <th>Name</th>
                                    <th>First Term</th>
                                    <th>Second Term</th>
                                    <th>Third Term</th>
                                    
                                </tr>
                                </thead>


                                <tbody>

                                    <?php   
                                    if (isset($_GET['session']) && isset($_GET['class'])) {
        
                                    foreach( $students as $student){
                                        $studentName = $studentController->student_name($student['admissionNo']); 
                                        $admissionNo = $student['admissionNo'];

                                         $sqlStudentReportFirst =  $conn->query("SELECT * from studentscores where session = '".$student['session']."' AND class = '".$student['class']."' AND term = 'First' AND admissionNo = '".$student['admissionNo']."'");
                                                 $studentReportFirst = mysqli_fetch_array($sqlStudentReportFirst);

                                         $sqlStudentReportSecond =  $conn->query("SELECT * from studentscores where session = '".$student['session']."' AND class = '".$student['class']."' AND term = 'Secon' AND admissionNo = '".$student['admissionNo']."'");
                                                 $studentReportSecond = mysqli_fetch_array($sqlStudentReportSecond);
                                                 $admissionNon= $student['admissionNo'];


                                         $sqlStudentReportThird =  $conn->query("SELECT * from studentscores where session = '".$student['session']."' AND class = '".$student['class']."' AND term = 'Third' AND admissionNo = '".$student['admissionNo']."'");
                                                 $studentReportThird = mysqli_fetch_array($sqlStudentReportThird);

                                                   $sqlfindStudentName = $conn->query ("SELECT * from studentusers where admissionNo='".$student['admissionNo']."'");

                                        $findStudentName = mysqli_fetch_array($sqlfindStudentName);

                                               
                                        ?>
                                <tr>
                                     
                                    <td><?php print $studentName['surname'];?> <?php print $studentName['firstName'];?> <?php print $studentName['lastName'];?></td>
                                    <td><a href="ReportSheet.php?session=<?php print $studentReportFirst['session'];?>&class=<?php print $studentReportFirst['class'];?>&term=<?php print $studentReportFirst['term'];?>&admissionNo=<?php print $admissionNo;?>" target="_blank"><?php if ($studentReportFirst['term'] == "First"){ echo "view";}?></a></td>

                                     <td><a href="ReportSheet2.php?session=<?php print $studentReportSecond['session'];?>&class=<?php print $studentReportSecond['class'];?>&term=<?php print $studentReportSecond['term'];?>&admissionNo=<?php print $admissionNo;?>" target="_blank"><?php if ($studentReportSecond['term'] == "Second"){ echo "view";}?></a></td>

                                      <td><a href="ReportSheet2.php?session=<?php print $studentReportThird['session'];?>&class=<?php print $studentReportThird['class'];?>&term=<?php print $studentReportThird['term'];?>&admissionNo=<?php print $admissionNo;?>" target="_blank"><?php if ($studentReportThird['term'] == "Third"){ echo "view";}?></a></td>
                                </tr>
                                <?php  }
                                     }else{
                                        print "<h6 style='color:red;'>Please choose session and class to view students result</h6>";
                                    } ?> 
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