<?php include 'call_php_function.php';
include 'header.php';
?>

<body>


    <?php
    $session = $_GET['session'];
    $term = $_GET['term'];





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
                            <li class="breadcrusmb-item"><a href="javascript:void(0);"></a></li>
                            <li class="breadcrumb-sitem active"></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <!-- START ROW -->
                    <div class="card m-b-15">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-lg-8 col-12 col-md-12 col-sm-12 col-xm-12">
                                    <?php if (isset($_GET['s'])) {

                                        echo '<span class="alert alert-success" >Attendance Filled</span>';
                                    } ?>
                                    <h4 class="mt-0 header-title mb-4"></h4>
                                    <form action="processSchAtt.php" method="POST">
                                        

                                            <div class="row">
                                                <div class="col-lg-6 col-12 col-md-12 col-sm-12 col-xm-12">
                                                    <div class="form-group">
                                                        <label class="control-label"> Session</label>
                                                        <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                                                            <option value="">Select a session</option>
                                                            <?php foreach ($sessions as $sessionz) { ?>
                                                                <option value="<?php print $sessionz['session']; ?>"><?php print $sessionz['session']; ?></option>
                                                            <?php } ?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12 col-md-12 col-sm-12 col-xm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Term</label>
                                                        <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                                            <option value="">Select a term</option>

                                                            <option value="First">First Term</option>
                                                            <option value="Second">Second Term</option>
                                                            <option value="Third">Third Term</option>


                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="wrap-group">
                                                        <label> No of time School Open</label>
                                                        <input type="number" name="schOpen" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="wrap-group">
                                                        <label> Term Ends</label>
                                                        <input type="date" name="termEnds" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="wrap-group">
                                                        <label>Next Term Begins</label>
                                                        <input type="date" name="nxtTermBegins" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="wrap-group">
                                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                            </div>

                                    </form>
                                </div>
                                
                            <div class="col-lg-4 col-12 col-md-12 col-sm-12 col-xm-12">
                               
                                <form action="" method="POST">
                                    <br>
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="">Add Comment</label>
                                            <input type="text" name="comment" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                        <br>
                                            <input type="submit" class="btn btn-primary" name="add-comment" value="Submit">
                                        </div>
                                        
                                    </div>
                                </form>
                                <p></p>
                            </div>
                        </div>

                          
                        </div>
                    </div>
            <!-- end container-fluid -->
        </div>
    </div>
    <!-- end wrapper -->
    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>
    <!-- Footer -->
    <script>
        function clearform() {
            document.getElementById("surname").value = "";
            document.getElementById("firstName").value = "";
            document.getElementById("lastName").value = "";
            document.getElementById("test").value = "";
            document.getElementById("exam").value = "";

        }
    </script>

</body>

</html>