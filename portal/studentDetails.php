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
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">STUDENT IN <?php if(isset($_GET['class'])){ print $class. '(' .$noOfStudent. ')';}?> </h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php if(isset($_GET['class'])){ print $session;}?></a></li>

                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <form  action="studentDetails.php" method="GET">
               
               <div class="row">
               <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">
                       <div class="form-group">
                           <label class="control-label"> Session</label>
                           <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                               <option value="">Select a session</option>
                               <?php foreach($sessions as $session){?>
                                   <option value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                               <?php } ?>
                           </select>

                       </div>
                   </div>
               
              
                   <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">
                       <div class="form-group">
                           <label class="control-label"> Class</label>
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

                            <h4 class="mt-0 header-title">Student Data</h4>
                            
                            <table id="student-detail" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Admission No</th>
                                        <th>Name</th>
                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php 
                                    if (isset($_GET['session']) && isset($_GET['class'])) {
        
                                    $no = 1;
                                    foreach( $students as $student){
                                        $studentName = $studentController->student_name($student['admissionNo']); 
                                     
                                        ?>
                                        <tr>

                                            <td><?php print $no++;?></td>
                                            <td><?php print $student['admissionNo']; ?></td>
                                            <td><?php print $studentName['surname']; ?> <?php print $studentName['firstName']; ?> <?php print $studentName['lastName']; ?> </td>
                                            <td>
                                                <div class="btn-group mso-mb-2">
                                                    <a href="#"><button title="view profile" type="button" class="btn btn-primary waves-light waves-effect"><i class="mdi mdi-account-circle"></i></button></a>
                                                    <a href="edit-student.php?admissionNo=<?php print $student['admissionNo']; ?>"> <button type="button" title="Edit profile" class="btn btn-primary waves-light waves-effect"><i class="fa fa-edit"></i></button></a>
                                                    <?php if ($role == "Admin") { ?>
                                                    <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php print $student['id']; ?>">
                                                   <button type="submit" class="btn btn-primary waves-light waves-effect delete" title="Delete" name="delete-student"onclick="return confirmation()"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                    <?php }?>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php  }
                                     }else{
                                        print "<h6 style='color:red;'>Please choose session and class to view student</h6>";
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
    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>
</body>


</html>