<?php include 'call_php_function.php';
include 'header.php';
?>
<body>

<?php include 'navigationMenu.php';

 ?>
    <!-- header-bg -->
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
             <?php if (isset($_GET['session'])) {?>
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $_GET['class'];?> STUDENTS</h4>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <h5 class="breadcrumb-item"><a href="javascript:void(0);"><?php print $_GET['session'];?></a></h5>
                           
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <?php }?>

            <form  action="clearance.php" method="GET">
               
               <div class="row">
               <div class="col-lg-4 col-12 col-md-12 col-sm-12 col-xm-12">
                       <div class="form-group">
                           <label class="control-label">Session</label>
                           <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                               <option value="">Select a session</option>
                               <?php foreach($sessions as $session){?>
                                   <option value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                               <?php } ?>
                           </select>

                       </div>
                   </div>
               
              
                   <div class="col-lg-4 col-12 col-md-12 col-sm-12 col-xm-12">
                       <div class="form-group">
                           <label class="control-label">Class</label>
                           <select id="classSelect" type="text" required="required" a value="" class="form-control" name="class">
                               <option value="">Select a class</option>
                               <?php foreach($classes as $class){?>
                                   <option value="<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                               <?php } ?>
                           </select>

                       </div>
                   </div>
                   <div class="col-lg-4 col-12 col-md-12 col-sm-12 col-xm-12">
                         <div class="form-group">
                             <label class="control-label">Term</label>
                                  <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                        <option value="">Select a term</option>

                                        <option value="First">First Term</option>
                                        <option value="Second">Second Term</option>
                                        <option value="Third">Third Term</option>

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

                            <h4 class="mt-0 header-title">Student Data</h4>
                          <?php if (isset($_GET['e'])) {;
                              echo "No student registered for this $sessionz, $term, and $class.";
                          }?>
                           
                            <table id="promote-studsent" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>


                                            <th>Admission No</th>
                                            <th>Name</th>
                                            <th><input type="checkbox" class="checkAll" name="id[]">Select All</th>

                                        </tr>

                                    </thead>
                                    <?php
                                    if (isset($_GET['session']) and isset($_GET['class'])) {

                                    ?>

                                        <tbody>
                                            <form action="processClearance.php" method="POST">
                                                <?php
                                               $no = 1;
                                                foreach( $students as $student){
                                                
                                                    // Check if the student is in the clearance table
                                                    $sqlStudentFound = $conn->query("SELECT * FROM clearance WHERE session = '".$student['session']."' AND class = '".$student['class']."' AND term = '".$_GET['term']."' AND admissionNo = '".$student['admissionNo']."'");
                                                    $foundStudent = mysqli_num_rows($sqlStudentFound);

                                                    // If the student is not found in the clearance table, display them
                                                    if ($foundStudent == 0) {
                                                        $studentName = $studentController->student_name($student['admissionNo']); ?>
                                                        <tr>



                                                            <td>
                                                                <?php print $student['admissionNo']; ?>
                                                            </td>
                                                            <td>
                                                                <?php print $studentName['surname']; ?> <span>
                                                                    <?php print $studentName['firstName']; ?>
                                                                </span> <span>
                                                                    <?php print $studentName['lastName']; ?>
                                                                </span>
                                                            </td>
                                                            <td><input type="checkbox" name="id[]" value="<?php print $student['admissionNo']; ?>">
                                                            </td>


                                                        </tr>

                                                    <?php } else {
                                                    ?>


                                            <?php }
                                                }
                                            } else{
                                                print "<h6 style='color:red;'>Please choose session and class to clear students</h6>";
                                            } ?> 

                                        </tbody>
                                </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->  
            <input type="hidden" value="<?php print $_GET['session'];?>" name="session">
             <input type="hidden" value="<?php print $_GET['term'];?>" name="term">
              <input type="hidden" value="<?php print $_GET['class'];?>" name="class">
             
                              </div>        
                               <button style="margin-left: 300px;" class="btn btn-primary" type="submit">Clear Student</button>
                          </div>
                    </div> 
                      </form>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

   <?php include 'footer.php';?>
<?php include 'modal.php';?>

</body>

</html>
<script type="text/javascript">
$(".checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>