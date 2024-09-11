<?php include 'call_php_function.php';
include 'header.php';
?>

<body>
    <!-- Navigation Bar-->

    <?php require_once 'navigationMenu.php'; ?>
    <div class="wrapper">
        <div class="container-fluid">
        <form  action="cbtscores.php" method="GET">
               
               <div class="row">
               <div class=" col-lg-3 col-12 col-md-12 col-sm-12 col-xm-12">
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
               
              
                   <div class=" col-lg-3 col-12 col-md-12 col-sm-12 col-xm-12">
                       <div class="form-group">
                           <label class="control-label"> Class</label>
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
                   <div class=" col-lg-3 col-12 col-md-12 col-sm-12 col-xm-12">
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
                        <div class=" col-lg-3 col-12 col-md-12 col-sm-12 col-xm-12">
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
                       <button class="btn btn-primary" name= "load-student" style="float: right;" id="submit" class="btn-submit">Load CBT Score</button>

                   </div>
               </div>
            </form>
        
            <!-- Page-Title -->
             <?php  if (isset($_GET['session']) and isset($_GET['term']) and isset($_GET['class'])){?>
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $_GET['subject']; ?> CBT SCORE SHEET</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $_GET['session']; ?></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $_GET['term']; ?></a></li>
                            <li class="breadcrumb-item active"><?php print $_GET['class']; ?></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <?php }?>

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
                              
                                <tbody>
                                <?php  if (isset($_GET['session']) and isset($_GET['term']) and isset($_GET['class'])){?>
                                    <?php foreach( $students as $student){
                                            $studentName = $studentController->student_name($student['admissionNo']); 
                                         
                                             $admissionNo = $student['admissionNo'];
                                      
                                        $sqlStudentScore =  $conn->query("SELECT * from cbtscores where session='".$_GET['session']."' and class = '".$_GET['class']."' and term='".$_GET['term']."' and admissionNo='$admissionNo' and subject='".$_GET['subject']."'");
                                        $studentScore = mysqli_fetch_array($sqlStudentScore);
                                       
                                        $emptyTest = $studentScore['test'] ?? '';
                                        
                                    ?>
                                        <tr id="">
                                            <td><?php print $studentName['admissionNo']; ?></td>
                                            <td><?php print $studentName['surname']; ?> <span><?php print $studentName['firstName']; ?> </span><span class="co-name"><?php print $studentName['lastName']; ?></span></td>
                                            <input type="hidden" value="<?php print $studentScore['admissionNo']; ?>" name="admissionNo">
                                            <?php
                                            if ($emptyTest == "") {
                                                echo "<td>-</td>";
                                            } else { ?>
                                                <td><?php print $studentScore['test']; ?></td>
                                            <?php } ?>

                                           

                                           
                                            <td> <?php if (!isset($studentScore['admissionNo'])) {
                                                    } else { ?><a type="button" class="btn btn-danger" href="deleteCbtScores.php?id=<?php print $studentScore['id']; ?>" onclick="return confirmation()">Delete</a><?php } ?>


                                        </tr>
                                    <?php } } ?>
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