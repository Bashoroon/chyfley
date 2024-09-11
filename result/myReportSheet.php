<?php include 'db.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require 'header.php';?>
</head>

<body>

 <div class="header-bg" 

 >
        <!-- Navigation Bar-->
        <?php include 'nav.php';?>
        <!-- End Navigation Bar-->

        <?php 
 $sqlstudentClass = $conn->query ("SELECT * from promotedstudent where admissionNo='".$_SESSION['admissionNo']."' order by id desc limit 1 ");
 $studentClass = mysqli_fetch_array($sqlstudentClass);
        $sqlStudent  = $conn->query ("SELECT * from studentusers where admissionNo ='$user'");
        $student = mysqli_fetch_array($sqlStudent);
        ?>
    <div class="wrapper">
        <div class="container-fluid">
           
            <div class="row">
                <div class="col-12">

                     <div style="background-image: url('diagram/bg.png'); background-size: cover; background-repeat: no-repeat; background-position: bottom center; ">
                        <form  action="updateProfilePix.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php print $_SESSION['admissionNo'];?>">
                                            <div class="form-group">
                                                <div class="edit-profile-photo">
                                                 <center><?php if($student['passport'] == ""){?><img src="https://portal.chyfleyschools.com.ng/passport/images.jfif"  alt="" class="img-responsive" style="border-radius: 50%; width: 20vw;"><?php }else{?><img srcset="https://portal.chyfleyschools.com.ng/passport/<?php print $student['passport'];?>"  alt="" class="img-responsive" style="border-radius: 50%; width: 20vw;"><?php } ?> </center>
                                                   
                                                </div>
                                             <center> <h5 class="text-white"><?php print $student['surname'];?> <?php print $student['firstName']; ?> <?php print  $student['lastName']; ?> (<?php print $student['admissionNo'];?>)</h5></center>
                                            </div>
                                        </form></div>
                         
                     
                </div>
            </div>
            
          

            <div class="row">
                  <?php
             $sqlMyResult = $conn->query("select * from studentscores where admissionNo='$user' group by session ");
             while($myResult = mysqli_fetch_array($sqlMyResult)){
                 $sessionz = $myResult['session'];
                   $termz = $myResult['term'];
                $sqlMyResultTerm = $conn->query("select * from studentscores where session='".$myResult['session']."' and admissionNo='$user' group by term ");
                   while ($myResultTerm = mysqli_fetch_array($sqlMyResultTerm)){
                    if($myResult) {  ?>
                <div class="col-sm-6 col-xl-3">
                   <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="mdi mdi-book bg-danger  text-white"></i>
                            </div>
                            <div>
                             <h5> <a href="ReportSheet2.php?admissionNo=<?php print $user;?>&session=<?php print $myResultTerm['session'];?>&term=<?php print $myResultTerm['term'];?>&class=<?php print $myResultTerm['class'];?>" class=" waves-effect waves-light font-16" target="_blank" >CHECK RESULT</a></h5>
                            </div><?php print $myResultTerm['term'];?> Term
                           <h3 class="mt-4"><?php print $myResultTerm['session'];?></h3><span class="float-right"><?php print $myResultTerm['class'];?></span>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                    </div>
              
            </div>
 <?php }else{
    echo '<h6 style="color:red;"> No result. Check back later or contact your admin</h6>';
 } } }?>
         

            <!-- END ROW -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
   <?php require 'footer.php';?>
   <?php require 'modal.php';?>

</body>

</html>
<?php 
                 $sqlstudentClass = $conn->query ("SELECT * from promotedstudent where admissionNo='".$_SESSION['admissionNo']."' order by id desc limit 1 ");
                    $studentClass = mysqli_fetch_array($sqlstudentClass);
                        $sqlSchooFee  =  $conn->query("SELECT * from studentbill where admissionNo='".$_SESSION['admissionNo']."' and session = '".$studentClass['session']."' order by id desc  ");

                           $sqlSchoolFeeTotal  =  $conn->query("SELECT sum(amount) as totalSchoolFee from studentbill where admissionNo='".$_SESSION['admissionNo']."' and session = '".$studentClass['session']."' order by id desc  ");
                         $schoolFeeTotal = mysqli_fetch_assoc($sqlSchoolFeeTotal);
                        ?>
                      
                            <form action="../student-account/pay.php" method="POST" >
  <div class="modal fade mybill" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">My Bill</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   
                                         <div class="row">
                                             <?php  while($studentBill = mysqli_fetch_array($sqlSchooFee)){?> 
                                         <div class="col-6">
                                     <div class="form-group">
                                    <label class="control-label"><?php print $studentBill['particular'];?></label>
                                      <input id="<?php print $studentBill['particular'];?>"  disablesd="" type="text"  required="required" value="<?php print $studentBill['amount'];?>" class="form-control "  name="amount">
                                </div>
                            </div><?php }?>
                              </div>
                            <input type="text" name="amount" id="myVal" value="<?php print $schoolFeeTotal['totalSchoolFee'];?>">
                              
                               
                              <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary"   style="float: right;" type="submit" 
                    class="btn-submit">Pay</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>