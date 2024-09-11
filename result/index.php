<?php include 'db.php';
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'header.php'; ?>
</head>

<body>

    <div class="header-bg">
        <!-- Navigation Bar-->
        <?php require 'nav.php'; ?>
        <!-- End Navigation Bar-->

        <?php
        $sqlstudentClass = $conn->query("SELECT * from promotedstudent where admissionNo='" . $_SESSION['admissionNo'] . "' order by id desc limit 1 ");
        $studentClass = mysqli_fetch_array($sqlstudentClass);
        $sqlStudent  = $conn->query("SELECT * from studentusers where admissionNo ='$user'");
        $student = mysqli_fetch_array($sqlStudent);
        $status = $student['status']; // Get the status from the result
        ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div style="background-image: url('diagram/bg.png'); background-size: cover; background-repeat: no-repeat; background-position: bottom center; ">
                            <form action="updateProfilePix.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php print $_SESSION['admissionNo']; ?>">
                                <div class="form-group">
                                    <div class="edit-profile-photo">
                                        <center><br><?php if ($student['passport'] == "") { ?><img src="https://portal.chyfleyschools.com.ng/passport/images.jfif" alt="" class="rounded-circle" style="width: 20vw;"><?php } else { ?><img srcset="https://portal.chyfleyschools.com.ng/passport/<?php print $student['passport']; ?>" alt="" class="rounded-circle" style=" width: 15%; height:10%;"><?php } ?> </center>

                                    </div>
                                    <center>
                                        <h5 class="text-white"><?php print $student['surname']; ?> <?php print $student['firstName']; ?> <?php print  $student['lastName']; ?> </h5>
                                    </center>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                </div>
                                <div>
                                    <?php if ($status !== 'Disable'): ?>
                                        <a href="myReportSheet.php" class="waves-effect waves-light font-16">CHECK RESULT</a>
                                    <?php else: ?>
                                        <span class="text-muted font-16">CHECK RESULT</span> <!-- Disabled Link -->
                                    <?php endif; ?></h5>
                                </div>
                                <h3 class="mt-4">MY RESULT</h3>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    $sqlstudentClass = $conn->query("SELECT * from promotedstudent where         
                admissionNo='" . $_SESSION['admissionNo'] . "' order by id desc limit 1 ");

                    $currentClass = mysqli_fetch_array($sqlstudentClass);
                    $clazz =  $currentClass['class'];
                    $sqlCurrentBills = $conn->query("SELECT sum(amount-discount) as currentTotalbill from 
                studentbill where admissionNo ='" . $_SESSION['admissionNo'] . "' and class ='$clazz' group by term 
                order by term desc");
                    $currentBill = mysqli_fetch_assoc($sqlCurrentBills);

                    $sqlOutstandingBills = $conn->query("SELECT sum(amount-discount) as outstandingTotalbill from 
                studentbill 
                where admissionNo ='" . $_SESSION['admissionNo'] . "' and class !='$clazz' ");
                    $outstandingBills = mysqli_fetch_assoc($sqlOutstandingBills);

                    ?>


                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                </div>
                                <div>
                                    <?php if ($status !== 'Disable'): ?>
                                        <h5> <a href="" class=" waves-effect waves-light font-16">CHECK BALANCE </a>
                                        <?php else: ?>
                                            <span class="text-muted font-16">CHECK BALANCE</span> <!-- Disabled Link -->
                                        </h5>
                                    <?php endif; ?></h5>
                                </div>
                                <h3 class="mt-4">SCHOOL FEE</h3>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                </div>
                                <div>
                                    <h5> <a href="" class=" waves-effect waves-light font-16" data-toggle="modal" data-target=".lesson">TAKE A LESSON</a></h5>
                                </div>
                                <h3 class="mt-4">E-NOTE</h3>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>
                        </div></a><a href="">
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-buffer bg-danger text-white"></i>
                                </div>
                                <div>
                                    <h5>
                                        <?php if ($status !== 'Disable'): ?>
                                            <a href="waytoexam.php" class="waves-effect waves-light font-16">EXAMINATION/CBT</a>
                                        <?php else: ?>
                                            <span class="text-muted font-16">EXAMINATION/CBT</span>
                                        <?php endif; ?>
                                    </h5> <!-- Closing h5 tag -->
                                </div>
                                <h3 class="mt-4">EXAM DETAILS</h3>
                                <div class="progress mt-4" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                    </

                                        <h3 class="mt-4">CBE</h3>
                                    <div class="progress mt-4" style="height: 4px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </div>
                            </div>
                            </a>
                        </div>




                    </div>



                    <!-- end container-fluid -->
                </div>
                <!-- end wrapper -->

                <!-- Footer -->
                <?php require 'footer.php'; ?>
                <?php require 'modal.php'; ?>

</body>

</html>





<script type="text/javascript">
    $(".search").on('change keyup', function() {

        var admissionNo = $('#admissionNo').val();
        var session = $('#session').val();
        var term = $('#term').val();
        var clazz = $('#class').val();
        var dataString = 'admissionNo=' + admissionNo + '&session=' + session + '&term=' + term + '&class=' + clazz;

        if (admissionNo != '') {
            $.ajax({
                type: "POST",
                url: "findstudents.php",
                data: dataString,
                cache: false,
                success: function(html) {
                    $(".here").html(html).show();

                },
                error: function(html) {
                    $(".here").text(html).show("slow").delay(5000).hide("slow"); //===Show Error Message====

                }
            });
        }
        return false;
    });
</script>