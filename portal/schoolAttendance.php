<?php include 'header.php';?>
<body>
 

<?php include 'header.php';
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
                        <h4 class="page-title">SCHOOL ATTENDANCE</h4>
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
                            <form action="processSchAtt.php" method="POST">
                                    <div class="form-input">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="wrap-group">
                                                  <label> No of time School Open</label>
                                                   <input type="number" name="schOpen" class="form-control" required>
                                                </div>
                                            </div>
                                           
                                            
                                        </div>
                                  
                                         
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="wrap-group">
                                                  <label> Term Ends</label>
                                                   <input type="date" name="termEnds" class="form-control" required>
                                                </div>
                                            </div>
 
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="wrap-group">
                                                  <label>Next Term Begins</label>
                                                   <input type="date" name="nxtTermBegins"class="form-control" required>
                                                </div>
                                            </div>
                                           
                                            
                                        </div>
                                        
                                    <div class="wrap-group">
                                      <input type="submit" class="btn-submit" name="submit" value="Submit">
                                    </div>
                               
                                 
                                       
                                         <input type="hidden" value="<?php print $session;?>" name="session">
                                            <input type="hidden" value="<?php print $term;?>" name="term">
                                            
                                            
                                             </form>
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
   <script>
        function clearform()
        {
            document.getElementById("surname").value="";
            document.getElementById("firstName").value="";
            document.getElementById("lastName").value="";
            document.getElementById("test").value="";
            document.getElementById("exam").value="";

        }
    </script>

</body>

</html>