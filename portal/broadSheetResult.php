<?php session_start();

if (!isset($_SESSION['id']) && $_SESSION['id']) {
   header('location:login.php');   
}
   ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'db.php';

?>
    <head>
        <meta charset="utf-8" />
        <title>Broad Sheet And Result Sheet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="">

        <!-- Responsive Table css -->
        <link href="assets/libs/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        `<style type="text/css">

}   
  </style>
    </head>

 
    <body>
 
 <?php include 'navigationBar.php';
$session = $_POST['session'];
$term = $_POST['term'];
$class = $_POST['class'];
  $sqlcla = $conn->query ("select * from broadsheet where class='$class' group by class");
 $cla = mysqli_fetch_array($sqlcla);
 
                                                                    ?>
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
       
        <div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo $cla['session']; ?></a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo $cla['term']; ?></a></li>
                                    <li class="breadcrumb-item active"></li>
                                </ol>
                            </div>  
                            
                            <h4 class="page-title"><?php echo $cla['class']; ?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
                  

                <div class="row" >
                    <div class="col-12">
                        <div class="card-box" >
                            <div class="responsive-table-plugin" >
                                <div class="table-rep-plugin" >
                                    <div class="table-responsive" data-pattern="priority-columns" >

                                         <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
    $sqlSelect = "select * from broadsheet where session = '$session' and term = '$term' and class = '$class'";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>

                                        <table  id="tech-companies-1" class=" table table-striped" style="height: 400px; overflow-y: scroll; overflow-x: scroll; display: inline-block;" >
                                            <thead style="flex: 1;">
                                            <tr>
                                                <th>name</th>
                                                <th data-priority="1" title="English language CA"><?php print substr('English  CA', 0, 12);?></th>
                                                <th data-priority="3" title="Enlish Language Exam"><?php print substr('English  Exam', 0, 13);?></th>
                                                <th title="Enlish Language Total"><?php print substr('English  Total', 0, 14);?></th>
                                                <th data-priority="1" title="Mathematics CA" ><?php print substr('Maths CA', 0, 10 );?></th>
                                               <th data-priority="3" title="Mathematics Exam" ><?php print substr('Maths Exam', 0, 10 );?></th>
                                                <th data-priority="3" title="Mathematics Total" ><?php print substr('Maths Total', 0,11);?></th>
                                                <th data-priority="6" title="Science $ technology CA"><?php print substr('Science $ Technology CA', 0,16);?></th>
                                                 <th data-priority="6" title="Science $ technology Exam"><?php print substr('Science $ Technology Exam', 0,16);?></th>
                                                 <th data-priority="6" title="Science $ Technology Total"><?php print substr('Science $ Technology Exam  Total', 0,16);?></th>
                                                <th data-priority="1" title="Creative and music CA"><?php print substr('Creative and Music CA', 0,16);?></th>
                                               <th data-priority="1" title="Creative and music Exam"><?php print substr('Creative and Music Exam', 0,16);?></th>
                                                <th data-priority="1" title="Creative and music Total"><?php print substr('Creative and Music CA', 0,16);?></th>
                                                <th data-priority="3" title="Vocational Aptitude CA"><?php print substr('Vocational CA', 0,16);?></th>
                                                <th data-priority="3" title="Vocational Aptitude Exam"><?php print substr('Vocational Aptitude Exam', 0,16);?></th>
                                                <th data-priority="3" title="Vocational Aptitude Total"><?php print substr('Vocational Aptitude Total', 0,16);?></th>
                                                <th data-priority="6" title="Religion Studies CA"><?php print substr('Religion Studies CA', 0,16);?></th>
                                                <th data-priority="6" title="Religion Studies Exam"><?php print substr('Religion Studies Total', 0,16);?></th>
                                                  <th data-priority="6" title="Religion Studies Total"><?php print substr('Religion Studies Total', 0,16);?></th>
                                                 <th data-priority="3" title="Yoruba Ca"><?php print substr('Yoruba Ca', 0,16);?></th>
                                                <th data-priority="3" title="Yoruba Exam"><?php print substr('Yoruba Exam', 0,16);?></th>
                                               <th data-priority="3" title="Yoruba Total"><?php print substr('Yoruba Total', 0,16);?></th>
                                                <th data-priority="3" title="French Ca"><?php print substr('French Ca', 0,16);?></th>
                                                 <th data-priority="3" title="French Exam"><?php print substr('French Exam', 0,16);?></th>
                                                 <th data-priority="3" title="French Total"><?php print substr('French Total', 0,16);?></th>
                                                <th data-priority="6" title="Business Studies Ca"> <?php print substr('Business Studies Ca', 0,16);?></th>
                                                  <th data-priority="6" title="Business Studies Exam"> <?php print substr('Business Studies Exam', 0,16);?></th>
                                                 <th data-priority="6" title="Business Studies Total"> <?php print substr('Business Studies Total', 0,16);?></th>
                                                 <th data-priority="1" title="Total"> <?php print substr('Total', 0,16);?></th>
                                                <th data-priority="3" title="Average"> <?php print substr('Average', 0,16);?></th>
                                                <th data-priority="3" title="No Of Time School Open"> <?php print substr('No Of Time School Open', 0,16);?></th>
                                                <th data-priority="6" title="No of Time Present"> <?php print substr('No Of Time Present', 0,16);?></th>
                                                <th data-priority="6" title="No of Time Absent"> <?php print substr('No Of Time Absent', 0,16);?></th>
                                                <th data-priority="6" title="Teacher's Comment"><?php print substr('Teacher Comment', 0,16);?></th>
                                                <th data-priority="1" title="Principal's Comment"><?php print substr('Principal Comment', 0,16);?></th>
                                               
                                             
                                            </tr>
                                            </thead>
        
                                            <tbody>
                                <?php
    while ($row = mysqli_fetch_array($result)) {
?>                  

                                            <tr>
                                                <td class="co-name"><?php  echo $row['name']; ?></td>
            <td><?php  echo $row['englishCa']; ?></td>
            <td><?php  echo $row['englishExam']; ?></td>
            <td><?php  echo $row['englishTotal']; ?></td>
            <td><?php  echo $row['mathematicsCa']; ?></td>
            <td><?php  echo $row['mathematicsExam']; ?></td>
            <td><?php  echo $row['mathematicsTotal']; ?></td>
            <td><?php  echo $row['basicCa']; ?></td>
            <td><?php  echo $row['basicExam']; ?></td>
            <td><?php  echo $row['basicTotal']; ?></td>
            <td><?php  echo $row['creativeCa']; ?></td>
            <td><?php  echo $row['creativeExam']; ?></td>
            <td><?php  echo $row['creativeTotal']; ?></td>
            <td><?php  echo $row['vocationalCa']; ?></td>
            <td><?php  echo $row['vocationalExam']; ?></td>
            <td><?php  echo $row['vocationalTotal']; ?></td>
            <td><?php  echo $row['religionCa']; ?></td>
            <td><?php  echo $row['religionExam']; ?></td>
            <td><?php  echo $row['religionTotal']; ?></td>
            <td><?php  echo $row['yorubaCa']; ?></td>
            <td><?php  echo $row['yorubaExam']; ?></td>
            <td><?php  echo $row['yorubaTotal']; ?></td>
            <td><?php  echo $row['frenchCa']; ?></td>
            <td><?php  echo $row['frenchExam']; ?></td>
            <td><?php  echo $row['frenchTotal']; ?></td>
            <td><?php  echo $row['businessCa']; ?></td>
            <td><?php  echo $row['businessExam']; ?></td>
            <td><?php  echo $row['businessTotal']; ?></td>
            <td><?php  echo $row['total']; ?></td>
             <td><?php  echo $row['average']; ?></td>
         <td><?php  echo $row['timeSchOpen']; ?></td>
            <td><?php  echo $row['present']; ?></td>
            <td><?php  echo $row['absent']; ?></td>
            <td><?php  echo $row['teachersComment']; ?></td>
            <td><?php  echo $row['principalsComment']; ?></td>
            
                                            </tr>
                                           <?php
    }
?>
                                            </tbody>
                                        </table>
                                        <?php
    }
?>
 



                                    </div> <!-- end .table-responsive -->

                                </div> <!-- end .table-rep-plugin-->
                            </div> <!-- end .responsive-table-plugin-->
                        </div> <!-- end card-box -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
       


        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2019 &copy; Xeria theme by <a href="">Coderthemes</a> 
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h5 class="m-0 text-white">Settings</h5>
            </div>
            <div class="slimscroll-menu">
                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                    </div>
            
                    <h5><a href="javascript: void(0);">Marcia J. Melia</a> </h5>
                    <p class="text-muted mb-0"><small>Product Owner</small></p>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <div class="row">
                    <div class="col-6 text-center">
                        <h4 class="mb-1 mt-0">8,504</h4>
                        <p class="m-0">Balance</p>
                    </div>
                    <div class="col-6 text-center">
                        <h4 class="mb-1 mt-0">8,504</h4>
                        <p class="m-0">Balance</p>
                    </div>
                </div>
                <hr class="mb-0" />

                <div class="p-3">
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                        <label class="custom-control-label" for="customSwitch1">Notifications</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                        <label class="custom-control-label" for="customSwitch2">API Access</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                        <label class="custom-control-label" for="customSwitch3">Auto Updates</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                        <label class="custom-control-label" for="customSwitch4">Online Status</label>
                    </div>
                </div>

                <!-- Timeline -->
                <hr class="mt-0" />
                <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
                <hr class="mb-0" />
                <div class="p-3">
                    <div class="inbox-widget">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                            <p class="inbox-item-text">Nice to meet you</p>
                        </div>

                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                        </div>
                    </div> <!-- end inbox-widget -->
                </div> <!-- end .p-3-->

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Responsive Table js -->
        <script src="assets/libs/rwd-table/rwd-table.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/responsive-table.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>