<?php include 'db.php';?>
o<?php session_start();
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
    <title>BROADSHEET RESULT</title>
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

 <?php include 'navigationMenu.php';        

                      
                      
 $session = $_POST['session'];
$term = $_POST['term'];
$class = $_POST['class'];
 $sqlcla = $conn->query ("select * from broadsheet where class='$class' group by class");
 $cla = mysqli_fetch_array($sqlcla);

?>
        <!-- End Navigation Bar-->
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">BROAD SHEET</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $cla['session'];?></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $cla['term'];?></a></li>
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

                            <h4 class="mt-0 header-title"><?php echo $cla['class'];?> Broad sheet Result</h4>
                            <p class="sub-title../plugins">
                            </p>


                             <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
    $sqlSelect = "select * from broadsheet where session = '$session' and term = '$term' and class = '$class'";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
                            <table id="datatable-buttons" class="minimalistBlack" style="border-collapse: collapse; border-spacing: 0; width: 10%  overflow-x: scroll; overflow-y: scroll;  display: inline-block; height: 400px; ">
                                <thead>
                                <tr style="max-width: 10vw;">
                                                <th style="min-width: 180px;">Name</th>
                                                <th style="max-width: -2px;" class="vertical"class="vertical" title="English language CA"><?php print substr('English  CA', 0, 12);?></th>
                                                <th class="vertical" title="Enlish Language Exam"><?php print substr('English  Exam', 0, 13);?></th>
                                                <th class="vertical"title="Enlish Language Total"><?php print substr('English  Total', 0, 14);?></th>
                                                <th class="vertical" title="Mathematics CA" ><?php print substr('Maths CA', 0, 10 );?></th>
                                               <th class="vertical" title="Mathematics Exam" ><?php print substr('Maths Exam', 0, 10 );?></th>
                                                <th class="vertical" title="Mathematics Total" ><?php print substr('Maths Total', 0,11);?></th>
                                                <th class="vertical" title="Science $ technology CA"><?php print substr('Science $ Technology CA', 0,16);?></th>
                                                 <th class="vertical" title="Science $ technology Exam"><?php print substr('Science $ Technology Exam', 0,16);?></th>
                                                 <th class="vertical" title="Science $ Technology Total"><?php print substr('Science $ Technology Exam  Total', 0,16);?></th>
                                                <th class="vertical" title="Creative and music CA"><?php print substr('Creative and Music CA', 0,16);?></th>
                                               <th class="vertical" title="Creative and music Exam"><?php print substr('Creative and Music Exam', 0,16);?></th>
                                                <th class="vertical" title="Creative and music Total"><?php print substr('Creative and Music CA', 0,16);?></th>
                                                <th class="vertical" title="Vocational Aptitude CA"><?php print substr('Vocational CA', 0,16);?></th>
                                                <th class="vertical" title="Vocational Aptitude Exam"><?php print substr('Vocational Aptitude Exam', 0,16);?></th>
                                                <th class="vertical" title="Vocational Aptitude Total"><?php print substr('Vocational Aptitude Total', 0,16);?></th>
                                                <th class="vertical" title="Religion Studies CA"><?php print substr('Religion Studies CA', 0,16);?></th>
                                                <th class="vertical" title="Religion Studies Exam"><?php print substr('Religion Studies Total', 0,16);?></th>
                                                  <th class="vertical" title="Religion Studies Total"><?php print substr('Religion Studies Total', 0,16);?></th>
                                                 <th class="vertical" title="Yoruba Ca"><?php print substr('Yoruba Ca', 0,16);?></th>
                                                <th class="vertical" title="Yoruba Exam"><?php print substr('Yoruba Exam', 0,16);?></th>
                                               <th class="vertical" title="Yoruba Total"><?php print substr('Yoruba Total', 0,16);?></th>
                                                <th class="vertical" title="French Ca"><?php print substr('French Ca', 0,16);?></th>
                                                 <th class="vertical" title="French Exam"><?php print substr('French Exam', 0,16);?></th>
                                                 <th class="vertical" title="French Total"><?php print substr('French Total', 0,16);?></th>
                                                <th class="vertical" title="Business Studies Ca"> <?php print substr('Business Studies Ca', 0,16);?></th>
                                                  <th class="vertical" title="Business Studies Exam"> <?php print substr('Business Studies Exam', 0,16);?></th>
                                                 <th class="vertical" title="Business Studies Total"> <?php print substr('Business Studies Total', 0,16);?></th>
                                                 <th class="vertical" title="Total"> <?php print substr('Total', 0,16);?></th>
                                                <th class="" title="Average"> <?php print substr('Average', 0,16);?></th>
                                                <th class="vertical" title="No Of Time School Open"> <?php print substr('No Of Time School Open', 0,16);?></th>
                                                <th class="vertical" title="No of Time Present"> <?php print substr('No Of Time Present', 0,16);?></th>
                                                <th class="vertical" title="No of Time Absent"> <?php print substr('No Of Time Absent', 0,16);?></th>
                                                <th class="" title="Teacher's Comment"><?php print substr('Teacher Comment', 0,16);?></th>
                                                <th class="vertical" title="Principal's Comment"><?php print substr('Principal Comment', 0,16);?></th>
                                               
                                             
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
        © 2019 TSIS <span class="d-none d-sm-inline-block"> - Designed by Datapalace IT Solution</span>.
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