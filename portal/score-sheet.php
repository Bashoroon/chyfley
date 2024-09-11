<?php include 'call_php_function.php';
include 'header.php'; 
?>
<script> 
    $(document).ready(function() {
    $('#score-sheet').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );</script>

<body>

    <?php include 'navigationMenu.php';
    
    ?>

    </div>
    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
             <?php if (isset($_GET['session']) && isset($_GET['class'])) {?>
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $_GET['subject']; ?> SCORE SHEET</h4>
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
            <form  action="score-sheet.php" method="GET">
               
               <div class="row">
                   <div class="col-lg-3 col-12 col-md-12 col-sm-12 ">
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
               
              
                   <div class="col-lg-3 col-12 col-md-12 col-sm-12 ">
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
                   <div class="col-lg-3 col-12 col-md-12 col-sm-12 ">
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
                        <div class="col-lg-3 col-12 col-md-12 col-sm-12 ">
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
                       <button class="btn btn-primary" name= "record" style="float: right;" id="submit" class="btn-submit">Load Student</button>

                   </div>
               </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                                    

                            <table id="score-sheet" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>First Test</th>
                                        <th>Second Test</th>
                                        <th>Exam</th>
                                        <th>Total</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <?php
                                $total = "";
                                $test = "";
                                $testTwo = "";
                                $exam = "";
                                if (isset($_GET['session']) && isset($_GET['class'])) {
                                    foreach( $records as $record){
                                    $studentName = $studentController->student_name($record['admissionNo']); 
                                        $total = $record['test'] + $record['exam'];
                                        $test = $record['test'];
                                        $testTwo = $record['test_two'];
                                        $exam = $record['exam'];
                                        
                                    ?>
                                        <tr id="">
                                            <td><?php print $studentName['surname']; ?> <span><?php print $studentName['firstName']; ?> </span><span class="co-name"><?php print $studentName['lastName']; ?></span></td>
                                            <input type="hidden" value="<?php print $record['admissionNo']; ?>" name="admissionNo">
                                            <?php
                                            if ($test == "") {
                                                echo "<td>-</td>";
                                            } else { ?>
                                                <td><?php print $record['test']; ?></td>
                                            <?php } ?>

                                            <?php
                                            if ($testTwo == "") {
                                                echo "<td>-</td>";
                                            } else { ?>
                                                <td><?php print $record['test_two']; ?></td>
                                            <?php } ?>


                                            <?php
                                            if ($exam == "") {
                                                echo "<td>-</td>";
                                            } else { ?>
                                                <td><?php print $record['exam']; ?></td>
                                            <?php } ?>

                                            <?php
                                            if ($total == "" and $test == "" and $exam == "") {
                                                echo "<td>-</td>";
                                            } else { ?>
                                                <td><?php print $record['test'] + $record['exam']; ?></td>
                                            <?php } ?>

                                            <td> <?php if ($record['id'] == "") {
                                                    } else { 
                                                        
                                                        if ($role == "Admin") { ?>
                                                    
                                                    <div class="btn-group mso-mb-2">
                                                    <a href="editScore.php?id=<?php print $record['id']; ?>"> <button type="button" title="Edit profile" class="btn btn-primary waves-light waves-effect"><i class="fa fa-edit"></i></button></a>
                                                    
                                                    <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php print $record['id']; ?>">
                                                   <button type="submit" class="btn btn-primary waves-light waves-effect delete" title="Delete" name="delete-score"onclick="return confirmation()"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                    <?php }?>
                                                </div>
                                                   

                                        </tr>
                                    <?php }} }?>
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
<script> 
    $(document).ready(function() {
    $('#score-sheet').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );</script>
</html>