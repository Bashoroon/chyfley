<?php include 'header.php';?>
<body>
 

<?php 
 $session = $_GET['session'];
$term = $_GET['term']; 
$class = $_GET['class'];




?>
<?php include 'navigationMenu.php';

?>

    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Attendance & Teacher's Comment</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Session <?php print $session;?></a></li>
                            <li class="breadcrumb-item active"><?php print $term;?></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
    
            <!-- START ROW -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4"></h4>
                            <div class="table-responsive">
                             
                                <table id="inpustScore" class="table table-hover">
                                    <thead>
                                        <tr>
                                           
                                            <th scope="col">Student Name</th>
                                           
                                            <th scope="col">Attendance/comment</th>

                                           
                                       </tr>
                                 
                                    </thead>     
                                         
                                    <tbody><?php
                                  

                                      if (isset($_GET['session']) and isset($_GET['term']) and isset($_GET['class'])){
                                        $sqlStudent  = $conn->query ("SELECT * from promotedstudent where 
                                            session='$session' and class='$class' ");
                                       
                                         while ($student = mysqli_fetch_array($sqlStudent)){;

                                           $sqlfindStudentName  = $conn->query ("SELECT * from studentusers where admissionNo = '".$student['admissionNo']."' ");
                                            $findStudentName = mysqli_fetch_array($sqlfindStudentName);

                                             $admissionNo = $student['admissionNo'];
                                $sqlCheckAtt = $conn->query ("SELECT * from studentatt where admissionNo='$admissionNo' and session='$session' and term='$term'");
                                        $found = mysqli_num_rows($sqlCheckAtt);
                                         
                                          if ($found > 0) {
                                            
                                         } else {?>
                                        <tr>
                                                <form action="processStudentAttComm.php" method="POST"> 
                                     <input type="hidden" value="<?php print $student['admissionNo'];?>" name="admissionNo[]">
                                             <td style="width: 30%;">
                                             <?php print $findStudentName['surname']; ?> <span><?php print $findStudentName['firstName']; ?></span><span> <?php print $findStudentName['lastName']; ?></span>
                                            </td>
                                        <?php $sqlComment = $conn->query("select * from teacherscomment");?>

                                          <td>     
                                      <input  style="width: 50px;" type="number" name="present[]" >:
                                      <select class="form-contrsol" style="width: 50%;" name="comment[]"  >
                                        <option value="">select teacher's comment</option>
                                        <?php  while ($comment = mysqli_fetch_array($sqlComment)){?>
                                        <option value="<?php print $comment['comment'];?>"><?php print $comment['comment'];?></option>
                                      <?php } ?>
                                      </select>  
                                           </td>
                                        
                                           
                                        </tr>
                                        <?php }?>
                                         <?php }}?>
                                         <input type="hidden" value="<?php print $session;?>" name="session">
                                            <input type="hidden" value="<?php print $term;?>" name="term">
                                             <input type="hidden" value="<?php print $class;?>" name="class">
                                           
                                    </tbody>
                                </table>
                                  <button  type="submit"  class="btn btn-primary" style="float: right;">Save 
                                  </button></form>                                
                            </div>
                       
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
   

</body>

</html>