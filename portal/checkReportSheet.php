
<?php include 'db.php';?>
<?php session_start();
  $user = $_SESSION['username'];
   $id = $_SESSION['password'];
  
if (!isset($_SESSION['username']) and !isset($_SESSION['password'])){;
   header('location:login.php');   
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>TENDER STEPS REPORT SHEET</title>
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
<style type="text/css">
    table.minimalistBlack {
  border: 3px solid #000000;
  width: 100%;
  text-align: left;
  border-collapse: collapse;

}
table.minimalistBlack td, table.minimalistBlack th {
  border: 1px solid #000000;  
}
table.minimalistBlack tbody td {
  font-size: 13px;
}
table.minimalistBlack thead {
  background: #CFCFCF;
  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  border-bottom: 3px solid #000000;
}
table.minimalistBlack thead th {
  font-size: 13px;
  font-weight: bold;
  color: #000000;
  text-align: left;
   overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;

  
}
.vertical  {
transform: rotate(-90deg);
height: 150px;

}
table.minimalistBlack tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #000000;
  border-top: 3px solid #000000;
}
table.minimalistBlack tfoot td {
  font-size: 14px;

}

</style>

<body>

   
                        <!-- Navigation Menu-->
                     <?php include 'navigationMenu.php';?>

        <!-- End Navigation Bar-->
        <?php
$session = $_POST['session'];
$term = $_POST['term'];
$class = $_POST['class'];
 $sqlcla = $conn->query ("select * from report where class='$class' group by class");
 $cla = mysqli_fetch_array($sqlcla);?>
    </div>
    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">RESULT SHEET</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $cla['session']; ?></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $cla['term']; ?></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

           

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title"><?php echo $cla['class']; ?> REPORT SHEET</h4>
                            <p class="sub-title../plugins">
                            </p>
                                  <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
    $sqlSelect = "select * from report where session = '$session' and term = '$term' and class = '$class'";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; overflow-x: scroll;  display: inline-block; height: 600px; width: 100%;">
                                <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>SUBJECT</th>
                                    <th>CA</th>
                                    <th>EXAM</th>
                                    <th>GRADE</th>
                                   
                                </tr>
                                </thead>


                                <tbody>
                              <?php
    while ($row = mysqli_fetch_array($result)) {
?>                  

                                            <tr>
                                                <th><?php  echo $row['name']; ?></td>
            <th><?php  echo $row['subject']; ?></td>
            <th><?php  echo $row['ca']; ?></td>
            <th><?php  echo $row['exam']; ?></td>
            <th><?php  echo $row['total']; ?></td>
           
                                           
                              
                                            </tr>
                                           <?php
    }
?>
                                            </tbody>
                                        </table>
                                        <?php
    }
?>
 
<button type="submit" class="btn btn-danger" style="float: right;">Delete</button>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->  

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
    <footer class="footer">
        © 2019 TSIS PORTAL <span class="d-none d-sm-inline-block"> - Designed by Datapalace IT Solution</span>.
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
<?php include 'modal.php';?>
</html>