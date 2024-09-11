<form action="" method="post">
     <div class="modal fade bs-example-modal-smC" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Class</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Class</label>
                                 <input id="edemo1" type="text" required="required" autocomplete="off" value="" class="form-control" name="class">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" name="add-class" type="submit" style="float: right;">Add Class</button>
                         </div>
                     </div>

                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
     </div>
 </form>


 

<!-- subject -->


 <!-- add subject -->
<form method="post" id="processSubject">
    <div class="modal fade addSubject" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Subject</label>
                                <input name="subject" required="required" type="text" class="form-control">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary" name="add-subject" type="submit" style="float: right;">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>


<!-- Edit subject -->
<form method="post" id="updateSubject">
    <div class="modal fade editSubject" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Edit Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Subject</label>
                                <input name="subject" required="required" type="text" class="form-control">
                                <input name="id" required="required" type="hidden"  class="form-control">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary" name="update-subject" type="submit" style="float: right;">Update Changes</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>


 <form  method="post">
     <div class="modal fade bs-example-modal-smS" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Session</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Session</label>
                                 <input id="demo1" type="text" required="required" autocomplete="off" value="" class="form-control" name="session">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" name="add-session" type="submit" style="float: right;">Add</button>
                         </div>
                     </div>

                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
     </div>
 </form>




 <form action="view-all-student.php" method="">
     <div class="modal fade view-all-student" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">View All Student</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Session</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="session">
                                     <option value="">Select a session</option>
                                     <?php $sqlsession = $conn->query("select * from session");
                                        while ($session = mysqli_fetch_array($sqlsession)) {; ?>

                                         <option value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>


                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" style="float: right;" id="submit" class="btn-submit">Check</button>

                         </div>
                     </div>
                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>
 </form>




 



 <!--- add CBT Question modal --->

 <form action="addQues.php" method="">
     <div class="modal fade examQuestion" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">Add Exam Questions</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Session</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="session">
                                     <option value="">Select a session</option>
                                     <?php $sqlsession = $conn->query("select * from session");
                                        while ($session = mysqli_fetch_array($sqlsession)) {; ?>

                                         <option value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
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
                             <div class="form-group">
                                 <label class="control-label">Class</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="class">
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
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Subject</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="subject">
                                     <option value="">Select a subject</option>
                                     <?php
                                        if ($nameFound['subject'] !== "") {
                                            $sqlSubject = $conn->query("select subject from users where username='$username'");
                                            while ($nameFound = mysqli_fetch_array($sqlSubject)) {
                                                $subjects = explode(',', $nameFound['subject']);
                                                foreach ($subjects as $subject) {
                                        ?>
                                                 <option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            $sqlsubject = $conn->query("select subject from subject");
                                            while ($subject = mysqli_fetch_array($sqlsubject)) { ?>
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
                             <div class="form-group">
                                 <label class="control-label">Exam type</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="examType">
                                 <option value="">Select a exam type</option>
                                    
                                    <option value="First">First Test</option>
                                    <option value="Second">Second Test</option>
                                    <option value="Exam">Exam</option>
                                 </select>

                             </div>
                         </div>
                     </div>
                    
                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" style="float: right;" type="submit" class="btn-submit">Check</button>

                         </div>
                     </div>
                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>
 </form>




 <form action="ReportSheet.php" method="">
     <div class="modal fade checkresultsheet2" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">Check Result Sheet2</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Session</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="session">
                                     <option value="">Select a session</option>
                                     <?php $sqlsession = $conn->query("select * from session");
                                        while ($session = mysqli_fetch_array($sqlsession)) {; ?>

                                         <option value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Term</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                     <option value="">Select a term</option>
                                     <?php $sqlterm = $conn->query("select * from term");
                                        while ($term = mysqli_fetch_array($sqlterm)) {; ?>

                                         <option value="<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Class</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="class">
                                     <option value="">Select a class</option>
                                     <?php
                                        if ($nameFound['class'] !== "") {
                                            $sqlclass = $conn->query("select class from users where username='$username'");
                                            while ($nameFound = mysqli_fetch_array($sqlclass)) {
                                                $classes = explode(',', $nameFound['class']);
                                                foreach ($classes as $class) {
                                        ?>
                                                 <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            $sqlclass = $conn->query("select * from class");
                                            while ($class = mysqli_fetch_array($sqlclass)) {
                                                ?>
                                             <option value="<?php echo $class['class']; ?>"><?php echo $class['class']; ?></option>
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
                             <button class="btn btn-primary" style="float: right;" type="submit" class="btn-submit">Check</button>

                         </div>
                     </div>
                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>
 </form>



 








 <div class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">

                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <p>Are you sure you want to delete?</p>
                 <div style="float: right;">
                     <form action="delete.php" method="POST">
                         <button style="margin-right: 20px;" class="btn btn-danger">Yes</button>
                         <input type="hiddsen" value="<?php print $studentScore['subject']; ?>" name="id">
                         <button class="btn btn-danger" type="reset">No</button>
                     </form>
                 </div>
             </div>

         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div>




 



 <form action="processTeacherSignature.php" method="POST">
     <div class="modal fade teachers_signature" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">Append Teacher's Signature</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Session</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="session">
                                     <option value="">Select a session</option>
                                     <?php $sqlsession = $conn->query("select * from session");
                                        while ($session = mysqli_fetch_array($sqlsession)) {; ?>

                                         <option value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Term</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                     <option value="">Select a term</option>
                                     <?php $sqlterm = $conn->query("select * from term");
                                        while ($term = mysqli_fetch_array($sqlterm)) {; ?>

                                         <option value="<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Class</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="class">
                                     <option value="">Select a class</option>
                                     <?php $sqlclass = $conn->query("select * from class");
                                        while ($class = mysqli_fetch_array($sqlclass)) {; ?>

                                         <option value="<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>


                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">User</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="user">
                                     <option value="">Select a User</option>
                                     <?php $sqlUser = $conn->query("select * from users");
                                        while ($user = mysqli_fetch_array($sqlUser)) {; ?>

                                         <option value="<?php print $user['signature']; ?>"><?php print $user['name']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" type="submit" style="float: right;" id="submit" name="import" class="btn-submit">Append Signature</button>

                         </div>
                     </div>
                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>
 </form>







 <form action="lesson.php" method="" target="_blank">
     <div class="modal fade lesson" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">Lesson Note</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">

                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Term</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                     <option value="">Select a term</option>
                                     <?php $sqlterm = $conn->query("select * from term");
                                        while ($term = mysqli_fetch_array($sqlterm)) {; ?>

                                         <option value="<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Class</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="class">
                                     <option value="">Select a class</option>
                                     <?php $sqlstudentClass = $conn->query("SELECT * from promotedstudent where admissionNo='" . $_SESSION['admissionNo'] . "' order by id desc limit 1 ");
                                        while ($class = mysqli_fetch_array($sqlstudentClass)) {; ?>

                                         <option selected="selected" value="<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>


                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" style="float: right;" type="submit" class="btn-submit">Check</button>

                         </div>
                     </div>
                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>
 </form>


 <!--- EXAMINATION STATUS--->

 
 <form action="allTopics.php" method="">
     <div class="modal fade viewEnote" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">EDIT LESSON NOTE</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">

                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Term</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                     <option value="">Select a term</option>
                                     <?php $sqlterm = $conn->query("select * from term");
                                        while ($term = mysqli_fetch_array($sqlterm)) {; ?>

                                         <option value="<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>

                   <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Class</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="class">
                                     <option value="">Select a class</option>
                                     <?php
                                            $sqlclass = $conn->query("select * from class");
                                            while ($class = mysqli_fetch_array($sqlclass)) {
                                                ?>
                                             <option value="<?php echo $class['class']; ?>"><?php echo $class['class']; ?></option>
                                     <?php
                                            
                                        }
                                        ?>

                                 </select>

                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Subject</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="subject">
                                     <option value="">Select a subject</option>
                                     <?php
                                        if ($nameFound['subject'] !== "") {
                                            $sqlSubject = $conn->query("select subject from users where username='$username'");
                                            while ($nameFound = mysqli_fetch_array($sqlSubject)) {
                                                $subjects = explode(',', $nameFound['subject']);
                                                foreach ($subjects as $subject) {
                                        ?>
                                                 <option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            $sqlsubject = $conn->query("select subject from subject");
                                            while ($subject = mysqli_fetch_array($sqlsubject)) { ?>
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
                             <button class="btn btn-primary" style="float: right;" type="submit" class="btn-submit">Check</button>

                         </div>
                     </div>
                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>
 </form>


 <form action="../acount/processParticulars.php" method="POST" id="addParticulars">
     <div class="modal fade addParticulars" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">Add Particular</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Pariculars</label>
                                 <div id="result_screen" style="display: none;" class="alert alert-success"></div>
                                 <input type="text" required="required" value="" name="particular" class="form-control" name="particular">
                                 <br>
                                 <input type="radio" id="" required="" class="checkAll incomeAndExpenses" value="income" name="incomeAndExpenses">
                                 <label for="income">Income</label>

                                 <input type="radio" id="" class="checkAll incomeAndExpenses" value="expenses" name="incomeAndExpenses">
                                 <label for="expenses">Expenses</label>

                                 <input type="radio" id="" class="checkAll incomeAndExpenses" value="school Fee" name="incomeAndExpenses">
                                 <label for="expenses">School Fee</label>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" style="float: right;" type="submit" class="btn-submit">Save</button>

                         </div>
                     </div>

                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>

 </form>


 <form action="../account/prepareBill.php" method="">
     <div class="modal fade prepareBill" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">Prepare Bill</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Term</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                     <option value="">Select a term</option>
                                     <?php $sqlterm = $conn->query("select * from term");
                                        while ($term = mysqli_fetch_array($sqlterm)) {; ?>

                                         <option value="<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Session</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="session">
                                     <option value="">Select a session</option>
                                     <?php $sqlsession = $conn->query("select * from session");
                                        while ($session = mysqli_fetch_array($sqlsession)) {; ?>

                                         <option value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Class</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="class">
                                     <option value="">Select a class</option>
                                     <?php $sqlclass = $conn->query("select * from class");
                                        while ($class = mysqli_fetch_array($sqlclass)) {; ?>

                                         <option value="<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" style="float: right;" id="submit" class="btn-submit">Submit</button>

                         </div>
                     </div>
                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>
 </form>












 
 <form action="allSubForExam.php" method="GET">
     <div class="modal fade checkQuestion" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">Examination</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Session</label>
                                 <select id="demo1" readonly type="text" required="required" value="" class="form-control" name="session">
                                     <option value="">Select a session</option>
                                     <?php $sqlsession = $conn->query("select * from session order by id desc limit 1");
                                        while ($session = mysqli_fetch_array($sqlsession)) {; ?>

                                         <option selected value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Term</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                     <option value="">Select a term</option>
                                     <?php $sqlterm = $conn->query("select * from term");
                                        while ($term = mysqli_fetch_array($sqlterm)) {; ?>

                                         <option value="<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Class</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="class">
                                     <option value="">Select your current class</option>
                                     <?php $sqlstudentClass = $conn->query("SELECT * from promotedstudent where admissionNo='" . $_SESSION['admissionNo'] . "'");
                                        while ($class = mysqli_fetch_array($sqlstudentClass)) {; ?>

                                         <option selected="selected" value="<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>


                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" style="float: right;" type="submit" class="btn-submit">Check</button>

                         </div>
                     </div>
                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>
 </form>

 <form action="../account/createBill.php" method="">
     <div class="modal fade createBill" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title mt-0">Create Bill </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Session</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="session">
                                     <option value="">Select a session</option>
                                     <?php $sqlsession = $conn->query("select * from session");
                                        while ($session = mysqli_fetch_array($sqlsession)) {; ?>

                                         <option value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label class="control-label">Term</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                     <option value="">Select a term</option>
                                     <?php $sqlterm = $conn->query("select * from term");
                                        while ($term = mysqli_fetch_array($sqlterm)) {; ?>

                                         <option value="<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-6">
                             <div class="form-group">
                                 <label class="control-label">Class</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="class">
                                     <option value="">Select a class</option>
                                     <?php $sqlclass = $conn->query("select * from class");
                                        while ($class = mysqli_fetch_array($sqlclass)) {; ?>

                                         <option value="<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                         <div class="col-6">
                             <div class="form-group">
                                 <label class="control-label">Type</label>
                                 <select id="demo1" type="text" required="required" a value="" class="form-control" name="type">
                                     <option value="">Select Type</option>
                                     <?php $sqlBillType = $conn->query("select * from preparedBill group by name");
                                        while ($bill = mysqli_fetch_array($sqlBillType)) {; ?>

                                         <option value="<?php print $bill['name']; ?>"><?php print $bill['name']; ?></option>
                                     <?php } ?>
                                 </select>

                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <button class="btn btn-primary" type="submit" style="float: right;" id="submit" class="btn-submit">Show Student</button>

                         </div>
                     </div>
                 </div>
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     </div>
 </form>









 <script type="text/javascript">
     $(function() {

         $('#processAddComment').on('submit', function(e) {

             e.preventDefault();

             $.ajax({
                 type: 'post',
                 url: 'processAddComment.php',
                 data: $('#processAddComment').serialize(),
                 success: function() {
                     $("#screen").text("Teacher's comment added successfully");
                     document.getElementById('processAddComment').reset();
                 }

             });

         });

     });



     $(function() {

         $('#addParticulars').on('submit', function(e) {

             e.preventDefault();

             $.ajax({
                 type: 'post',
                 url: 'processParticulars.php',
                 data: $('#addParticulars').serialize(),
                 success: function(data) {
                     $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //=== Show Success Message==
                     $("#addParticulars").trigger("reset");
                 },
                 error: function(data) {
                     $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //===Show Error Message====
                     $("#addParticulars").trigger("reset");
                 }

             });

         });

     });

     $(function() {

         $('#processPreparedBill').on('submit', function(e) {

             e.preventDefault();

             $.ajax({
                 type: 'post',
                 url: 'processPreparedBill.php',
                 data: $('#processPreparedBill').serialize(),
                 success: function(data) {
                     $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //=== Show Success Message==
                     $("#processPreparedBill").trigger("reset");
                 },
                 error: function(data) {
                     $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //===Show Error Message====
                     $("#processPreparedBill").trigger("reset");
                 }

             });

         });

     });
 </script>


 <script>
     function payWithPaystack() {
         var admissionNo = document.getElementById('admissionNo').value;
         var session = document.getElementById('session').value;
         var term = document.getElementById('term').value;
         var classz = document.getElementById('class').value;
         var amount = document.getElementById('amount').value;
         var handler = PaystackPop.setup({
             key: 'pk_test_632ac2eaa3db5bb6a2f6683e2af1914f35edf816',
             email: 'lawalsherifoyetola@gmail.com',
             amount: document.getElementById('amount').value * 100,
             ref: '', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
             metadata: {
                 custom_fields: [{
                         display_name: "Admission Number",
                         variable_name: admissionNo,
                         value: document.getElementById('admissionNo').value


                     },
                     {
                         display_name: "Session",
                         variable_name: session,
                         value: document.getElementById('session').value


                     },
                     {
                         display_name: "Term",
                         variable_name: term,
                         value: document.getElementById('term').value


                     },
                     {
                         display_name: "Class",
                         variable_name: classz,
                         value: document.getElementById('class').value


                     }
                 ]
             },
             callback: function(response) {
                 window.location = "callback.php?reference=" + response.reference + '&session=' + session + '&term=' + term + '&class=' + classz + '&amount=' + amount + '&admissionNo=' + admissionNo;
             },
             onClose: function() {
                 alert('window closed');
             }
         });
         handler.openIframe();
     }
 </script>