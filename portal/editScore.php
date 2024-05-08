<?php include 'header.php';?>

<body>

   <?php include 'navigationMenu.php';
$id = $_GET['id'];
$admissionNo = $_GET['admissionNo'];
$sqlFetchTErmSession = $conn->query("SELECT * from studentscores where id='$id'");
$fetchTErmSession = mysqli_fetch_array($sqlFetchTErmSession);
$session = $fetchTErmSession['session'];
$term = $fetchTErmSession['term'];
$class = $fetchTErmSession['class'];
$subject = $fetchTErmSession['subject'];

   ?>

    </div>
    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?php print $subject;?> SCORE SHEET</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $session;?></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $term;?></a></li>
                            <li class="breadcrumb-item active"><?php print $class;?></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

             <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <?php if (isset($_GET['update']) == 1) {
                              echo "Scores Updated Succesfully";
                            }?>

                            <table id="score-ssheet" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                        <tr>
                                            <th >Name</th>
                                            <th >Test</th>
                                            <th >Exam</th>
                                             <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <?php
                                             

                       
                                             ?>
                                        <tbody>
             
<?php
 
  $sqlStudentScore =  $conn->query("SELECT * from studentscores where id='$id' ");
   $studentScore = mysqli_fetch_array($sqlStudentScore);
  $sqlstudentz = $conn->query ("SELECT * from studentusers where  admissionNo='".$studentScore['admissionNo']."'");
   $studentz = mysqli_fetch_array($sqlstudentz);


 ?>
                                        <tr><form action="updateCorrectedScore.php" method="POST">
                                          <input type="hidden" name="id" value="<?php print $id;?>">
                                            <td><?php print $studentz['surname'];?> <span><?php print $studentz['firstName'];?> </span><span class="co-name"><?php print $studentz['lastName'];?></span></td>
                                            <input type="hidden" value="<?php print $studentScore['admissionNo'];?>" name="admissionNo">      
                                            <td><input type="" name="test" value="<?php print $studentScore['test'];?>"></td>
                                            <td><input type="" name="exam" value="<?php print $studentScore['exam'];?>"></td>
                                           
                                        
                                             <td><button class="bg-danger">Submit</button>
                                           </form>
                                        </tr>
                                     <?php  ?>
                                        </tbody>
                                    </table>
                                </div>
                               <!--  <input type="hidden" name="session" value="<?php print $studentScore['session'];?>">
                                <input type="hidden" name="term" value="<?php print $studentScore['term'];?>">
                                <input type="hidden" name="id" value="<?php print $studentScore['id'];?>">
                                <input type="hidden" name="subject" value="<?php print $studentScore['subject'];?>">
                                <input type="hidden" name="class" value="<?php print $studentScore['class'];?>">
 -->


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
   <?php include 'footer.php';?>
    <?php include 'modal.php';?>
<script type="text/javascript">
    function confirmation() {
      return confirm('Are you sure you want to do this?');
    }
</script>
  
</body>

</html>