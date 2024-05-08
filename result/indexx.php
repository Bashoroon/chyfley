<?php include 'db.php';?>
<?php session_start();
  $admission = $_SESSION['admission'];
  
if (!isset($_SESSION['admission'])){;
   header('location:student-login.php');  } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>TSIS ASSIGNMENT PORTAL</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="../images/log.jpg">

    <!-- DataTables -->
    <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>

    

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"></h4>
                    </div>
                    
                </div>
                <!-- end row -->
            </div>
<div class="row" style="margin-top: -170px;">
   <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-6">
    <img src="../images/tender-logo.png" height="200px;" style="display: block; margin-left: auto;margin-right: auto; ">
    </div>
</div>
            <div class="row">

                     <?php
                $sqlselect = $conn->query("SELECT * FROM assignment order by datez desc ");?>
               

                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Assignment</h4>
                          
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;  overflow-y: scroll; display: inline-block; ">
                                <thead>
                                <tr>
                                    <th>Session</th>
                                    <th>Term</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Questions</th>
                                    <th>Date Assigned</th>
                                    <th>Date To Be Submitted</th>
                                     
                                                                
                                       
                                </tr>
                                </thead>


                                <tbody><?php
                                     while ($select = mysqli_fetch_array($sqlselect)){;?>
                                <tr>
                                    <td><?php print $select['session'];?></td>
                                    <td><?php print $select['term'];?></td>
                                    <td><?php print $select['class'];?></td>
                                    <td><?php print $select['subject'];?></td>
                                    <td><?php print $select['questions'];?></td>
                                    <td><?php print $select['datez'];?></td>
                                    <td><?php print $select['dates'];?></td>
                                      
                                   
                                   
                                </tr>
                               <?php }?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->  
            </div> <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
    <footer class="footer">
        © 2019 TSIS PORTAL <span class="d-none d-sm-inline-block"> - Designed with by Datapalace IT Solutions</span>.
    </footer>

    <!-- End Footer -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>

    <!-- Required datatable js -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/datatables/jszip.min.js"></script>
    <script src="../plugins/datatables/pdfmake.min.js"></script>
    <script src="../plugins/datatables/vfs_fonts.js"></script>
    <script src="../plugins/datatables/buttons.html5.min.js"></script>
    <script src="../plugins/datatables/buttons.print.min.js"></script>
    <script src="../plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/pages/datatables.init.js"></script>  

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>