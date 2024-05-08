<?php include 'header.php'; ?>

<body>


    <?php 
    $session = $_GET['session'];
    $term = $_GET['term'];
    $class = $_GET['class'];
  



    ?>
    <?php include 'navigationMenu.php';
  
    ?>

    <!-- header-bg -->
    <div class="main main-app p-3 p-lg-4">
    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Change Examination Status</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Session <?php print $session; ?></a></li>
                            <li class="breadcrumb-item active"><?php print $term; ?></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
                
                 
              <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                
                                <h4 class="mt-0 header-title mb-4"></h4>

                                <div class="table-responsive">
                                    <table id="inpustScore" class="table table-hover">
                                        <thead>
                                            <tr>

                                                <th scope="col">Subject</th>
                                                <th scope="col">Class</th>

                                                <th scope="col">Status</th>

                                                <th scope="col">Start time</th>

                                                <th scope="col">End Time</th>
                                                <th scope="col">change status</th>


                                             


                                            </tr>

                                        </thead>
                                        <tbody><?php


                                                $sqlQues = $conn->query("select * from questionbank where session='$session' and term='$term' and class ='$class' group by subject ");
                                                while ($ques = mysqli_fetch_array($sqlQues)) {
                                                    $status = $ques['status'];

                                                ?>
                                                <tr>


                                                  
                                                        <td>
                                                        <?php print $ques['subject']; ?>
                                                        </td>
                                                       
                                                        <td>
                                                          
                                                            <?php print $ques['class']; ?>
                                                        </td>
                                                        <td>

                                                            <?php print $ques['status']; ?>
                                                        </td>
                                                        <td>
                                                        <?php print $ques['startDate']; ?>
                                                           

                                                        </td>
                                                        <td>
                                                        <?php print $ques['endDate']; ?>
                                                        </td>
                                                        
                                                           
                                                        <td>
                                                        <form action="processExamStatus.php" method="POST">
                                                            <input type="datetime-local" name="startDate" id="inputstartDate" class="form-control" value="<?php print $ques['startDate']; ?> " require ><br>
                                                              
                                                            <input type="datetime-local" name="endDate" id="inputendDate" class="form-control" value="<?php print $ques['endDate']; ?> " require ><br>
                                         <input type="number" name="duration" placeholder="duration" class="form-control" value="" require ><br>
                                                          
                                                              <select  type="text" required="required" value="" class="form-control" name="status">
                                                                <option value="">Select a Status</option>

                                                                <option value="closed">Close</option>
                                                                <option value="opened">Open</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="correction">Correction</option>

                                                            </select><br>
                                                            <input type="hidden" value="<?php print $ques['subject']; ?>" name="subject"> 
                                                            <input type="hidden" value="<?php print $class; ?>" name="class">
                                                            <input type="hidden" value="<?php print $session; ?>" name="session">
                                                            <input type="hidden" value="<?php print $term; ?>" name="term">
                                                           
                                                            <button type="submit" class="btn btn-primary" >Save</button>
                                                            </form>
                                                        </td>

                                                </tr>
                                               
                                            <?php } ?>

                                            

                                        </tbody>
                                    </table>





                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
             
            <!-- end container-fluid -->
        </div>
          </div>
        <!-- end wrapper -->
        <?php require_once("footer.php"); ?>
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