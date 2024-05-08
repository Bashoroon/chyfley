<?php include 'header.php';?>
<body>

<?php include 'navigationMenu.php';

 ?>
    <!-- header-bg -->
<?php 
$session = $_GET['session'];
$class = $_GET['class'];
$sessionz = $_GET['e'];
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
                                     if (isset($_GET['session']) and isset($_GET['class'])) {;
                                   
                                     $sqlstudentz = $conn->query ("SELECT * from promotedstudent where session = '$session' and class = '$class'");
                                     
                                     ?>

                                <tbody>
                                    <form  action="processPromote.php" method="POST">
<?php while ($studentz = mysqli_fetch_array($sqlstudentz)){;
 $sqlName = $conn->query ("SELECT * from studentusers where admissionNo = '".$studentz['admissionNo']."'");
  $name = mysqli_fetch_array($sqlName);
  ?>
                                <tr>

                                  
                                   
                                    <td><?php print $studentz['admissionNo'];?></td>
                                    <td><?php print $name['surname'];?> <span><?php print $name['firstName'];?></span> <span><?php print $name['lastName'];?></span></td>
                                     <td><input type="checkbox" name="id[]" value="<?php print $studentz['admissionNo'];?>">
</td>
                                   
                                    
                                </tr>
                                <?php } }?>
                               
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->  
              <center><div class="row">
                                    <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Session</label>
                                      <select id="demo1" style="width: 50%;" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                </div>
                                 </div>     <br>
                                   <div class="col-6">
                                 <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" style="width: 50%;" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                  while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                              </div>        
                               <button style="margin-left: -710px;" class="btn btn-primary" type="submit">Promote</button>
                          </div>
                    </div> 
                      </form>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
   <?php include 'footer.php';?>
<?php include 'modal.php';?>

</body>

</html>
<script type="text/javascript">
$(".checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>