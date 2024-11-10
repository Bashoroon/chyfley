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
                                            <form  method="POST">
                                                <?php
                                               $no = 1;
                                                foreach( $students as $student){
                                                    $admissionNo = $student['admissionNo'];
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
                                                            <td>  <input type="checkbox" class="clearance-checkbox" value="<?php echo $admissionNo; ?>" data-admissionno="<?php echo $admissionNo; ?>">
                                                            </td><div id="result"></div>
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
            <input type="hidden"  value="<?php print $_GET['session'];?>" name="session" id="session">
             <input type="hidden" value="<?php print $_GET['term'];?>" name="term" id="term">
              <input type="hidden" value="<?php print $_GET['class'];?>" name="class" id="clazz">
             
                              </div>        
                               
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

$(document).ready(function() {
    $(".clearance-checkbox").change(function() {
        
        if ($(this).is(":checked")) {
            var admissionNo = $(this).data("admissionno"); 
            var session = $("#session").val();
            var term = $("#term").val();
            var clazz = $("#clazz").val();
            
            var actionType = $(this).is(":checked") ? "process_clearance" : "delete_clearance";
         
            // Send data to the server using AJAX
            $.ajax({
                url: "call_php_function.php",
                type: "POST",
                data: {
                     //process_clearance: true,
                    action: actionType,
                    admissionNo: admissionNo,
                    session: session,
                    term: term,
                    class: clazz
                   
                },

                beforeSend: function() {
                    // Show loading indicator before sending the request
                    $("#result").html("<p>Loading...</p>");

                },

                success: function(response) {
                    // Display the response from the server
                    $("#result").html(response);
                   
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Display an error message
                    $("#result").html("Error in connection.Please check your connection: " + textStatus);
                }
            });
        }
        });
    });
</script>