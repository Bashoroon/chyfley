<?php include 'header.php';?>
<body>

<?php include 'navigationMenu.php';

 ?>
    <!-- header-bg -->
<?php 
$session = $_GET['session'];
$class = $_GET['class'];
$term = $_GET['term'];
?>
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $class;?> STUDENTS</h4>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <h5 class="breadcrumb-item"><a href="javascript:void(0);"><?php print $session;?></a></h5>
                           
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


                                        $sqlstudentz = $conn->query("SELECT * FROM promotedstudent WHERE session = '$session' AND class = '$class' and deleteStatus != 1");

                                    ?>

                                        <tbody>
                                            <form action="processClearance.php" method="POST">
                                                <?php
                                                while ($studentz = mysqli_fetch_array($sqlstudentz)) {
                                                    $admissionNo = $studentz['admissionNo'];

                                                    // Check if the student is in the clearance table
                                                    $sqlStudentFound = $conn->query("SELECT * FROM clearance WHERE session = '$session' AND class = '$class' AND term = '$term' AND admissionNo = '$admissionNo'");
                                                    $foundStudent = mysqli_num_rows($sqlStudentFound);

                                                    // If the student is not found in the clearance table, display them
                                                    if ($foundStudent == 0) {
                                                        $sqlName = $conn->query("SELECT * FROM studentusers WHERE admissionNo = '$admissionNo'");
                                                        $name = mysqli_fetch_array($sqlName); ?>
                                                        <tr>



                                                            <td>
                                                                <?php print $studentz['admissionNo']; ?>
                                                            </td>
                                                            <td>
                                                                <?php print $name['surname']; ?> <span>
                                                                    <?php print $name['firstName']; ?>
                                                                </span> <span>
                                                                    <?php print $name['lastName']; ?>
                                                                </span>
                                                            </td>
                                                            <td><input type="checkbox" name="id[]" value="<?php print $studentz['admissionNo']; ?>">
                                                            </td>


                                                        </tr>

                                                    <?php } else {
                                                    ?>


                                            <?php }
                                                }
                                            } ?>

                                        </tbody>
                                </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->  
            <input type="hidden" value="<?php print $session;?>" name="session">
             <input type="hidden" value="<?php print $term;?>" name="term">
              <input type="hidden" value="<?php print $class;?>" name="class">
             
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