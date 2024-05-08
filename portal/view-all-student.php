<?php include 'header.php';?>
<body>

    <div class="header-bg">
        <!-- Navigation Bar-->
      <?php include 'navigationMenu.php';?>
        <!-- End Navigation Bar-->

    </div>
    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Data Table</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Data Table</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">All Students</h4>
                           
                              
               
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Full Name</th>
                                    
                                </tr>
                                </thead>


                                <tbody>
                                     <?php
                $sqlStudent = $conn->query("SELECT * FROM promotedstudent, studentusers where promotedstudent.admissionNo = studentusers.admissionNo ");
                while($student = mysqli_fetch_array($sqlStudent)){
                   
                    ?>
                                <tr>
                                    <td><?php print $student['admissionNo'];?></td>
                                    <td><?php print $student['surname']. ' ' .$student['firstName'];?></td>
                                    
                                </tr>
                               <?php } ?>
                            </table>

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
</body>

</html>