<?php 
include 'call_php_function.php';
include 'header.php';
?>
<body>

<?php include 'navigationMenu.php';

?>

    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
             <?php if (isset($_GET['session']) && isset($_GET['class'])) {?>
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $_GET['subject'];?></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Session <?php print $_GET['session'];?></a></li>
                            <li class="breadcrumb-item active"><?php print $_GET['term'];?></li>
                        </ol>
                    </div>
                </div>
            </div>
            <?php }?>
                <!-- end row -->
            <form  action="inputScore.php" method="GET">
               
               <div class="row">
               <div class="col-lg-3 col-12 col-md-12 col-sm-12 col-xm-12">
                       <div class="form-group">
                           <label class="control-label">Session</label>
                           <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                               <option value="">Select a session</option>
                               <?php foreach($sessions as $sessionz){?>
                                   <option value="<?php print $sessionz['session']; ?>"><?php print $sessionz['session']; ?></option>
                               <?php } ?>
                           </select>

                       </div>
                   </div>
               
              
                   <div class="col-lg-3 col-12 col-md-12 col-sm-12 col-xm-12">
                       <div class="form-group">
                           <label class="control-label">Class</label>
                           <select id="classSelect" type="text" required="required" a value="" class="form-control" name="class">
                               <option value="">Select a class</option>
                               <?php    if ($nameFound['class'] !== "") {
                                           foreach($teacherClasses as $teacherClass) {
                                                $classTeachers = explode(',', $teacherClass['class']);
                                                foreach ($classTeachers  as $classTeacher) {
                                        ?>
                                                 <option value="<?php echo $classTeacher; ?>"><?php echo $classTeacher; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            foreach($classes as $class)  {
                                                ?>
                                             <option value="<?php echo $class['class']; ?>"><?php echo $class['class']; ?></option>
                                     <?php
                                            }
                                        }
                                        ?>
                           </select>

                       </div>
                   </div>
                   <div class="col-lg-3 col-12 col-md-12 col-sm-12 col-xm-12">
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
                        <div class="col-lg-3 col-12 col-md-12 col-sm-12 col-xm-12">
                             <div class="form-group">
                                 <label class="control-label">Subject</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="subject">
                                     <option value="">Select a subject</option>
                                     <?php
                                        if ($nameFound['subject'] !== "") {
                                           foreach($teacherSubjects as $teacherSubject){
                                                $subjectTeachers = explode(',', $teacherSubject['subject']);
                                                foreach ($subjectTeachers as $subjectTeacher) {
                                        ?>
                                                 <option value="<?php echo $subjectTeacher; ?>"><?php echo $subjectTeacher; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            foreach($subjects as $subject){?>
                                             <option value="<?php print $subject['subject']; ?>"><?php print $subject['subject']; ?></option>
                                     <?php
                                            }
                                        }
                                        ?>
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
            <!-- START ROW -->
             <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4"></h4>
                                
                                <form action="" method="POST">
                                    <div class="table-responsive">
                                        <table id="inpustScore" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">First Test</th>
                                                    <th scope="col">Second Tes</th>
                                                    <th>Exam</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['session']) && isset($_GET['term']) && isset($_GET['class']) && isset($_GET['subject'])) {
                                                    foreach( $students as $student){
                                                        $studentName = $studentController->student_name($student['admissionNo']); 
                                                        
                                                        //admission NUmbber
                                                        $admissionNo = $student['admissionNo'];

                                                        // query student CBT Scores
                                                        $cbtScores = $recordController->cbt_scores($admissionNo);
                                                        
                                                       // find if student has test and exam score
                                                       $found = $recordController->student_score_exist($admissionNo);
                                                        if ($found > 0) {
                                                            // if found do not show the student
                                                        } else { // else show student score?>
                                                            <tr>
                                                                <input type="hidden" value="<?php print $student['admissionNo'];?>" name="admissionNo[]">
                                                                <td>
                                                                    <?php print $studentName['surname']; ?> <span><?php print $studentName['firstName']; ?></span><span> <?php print $studentName['lastName']. ' ' .$studentName['admissionNo']; ?></span>
                                                                </td>
                                                                <td><input class="form-control" style="width: 50%;" value="<?php print $cbtScores['test'] ?? '';?>" type="number" name="test[]" max="20">
                                                                </td>
                                                                <td><input class="form-control" style="width: 50%;" value="<?php print $cbtScores['test_two'] ?? '';?>" type="number" name="testTwo[]" max="20">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" style="width: 50%;" type="number" value="<?php print $cbtScores['exam'] ?? '';?>" name="exam[]" max="60"> 
                                                                </td>
                                                            </tr>
                                                <?php
                                                        }
                                                    }
                                                } else{
                                                    print "<h6 style='color:red;'>Please choose session, class, term and subject to view student</h6>";
                                                } ?>
                                            
                                                <input type="hidden" value="<?php print $_GET['session'];?>" name="session">
                                                <input type="hidden" value="<?php print $_GET['term'];?>" name="term">
                                                <input type="hidden" value="<?php print $_GET['class'];?>" name="class">
                                                <input type="hidden" value="<?php print $_GET['subject'];?>" name="subject">
                                            </tbody>
                                        </table>
                                        <button type="submit" name="add-score" onClick="clearform();" class="btn btn-primary" style="float: right;">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
            <!-- END ROW -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->
<?php include 'footer.php';?>
<?php include 'modal.php';?>
    <!-- Footer -->
   <script>
        function clearform()
        {
            document.getElementById("surname").value="";
            document.getElementById("firstName").value="";
            document.getElementById("lastName").value="";
            document.getElementById("test").value="";
            document.getElementById("exam").value="";

        }
    </script>

</body>

</html>