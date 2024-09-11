<?php
include 'call_php_function.php';
include 'header.php';


$studentInfo = $studentController->index();

?>

<body>

    <?php include 'navigationMenu.php'; ?>
    <!-- End Navigation Bar-->

    </div>
    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">CHS</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Student Informations</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Student Information</h4>
                            <p class="sub-title"></p>

                            <form method="POST" id="updateStudentsProfile">
                                <div class="form-group">
                                    <label>Admission Number</label>
                                    <input type="hidden" name="admissionNo" id="pass2" value="<?php print $studentInfo['admissionNo']; ?>" class="form-control" placeholder="Surname" />
                                    <input type="text" name="admissionNo" class="form-control" value="<?php print $studentInfo['admissionNo']; ?>" readonly placeholder="" />
                                    <input type="hidden" name="admissionNo" class="form-control" value="<?php print $studentInfo['admissionNo']; ?>" placeholder="" />
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <div>
                                        <input type="" name="surname" id="pass2" readonly="" value="<?php print $studentInfo['surname']; ?>" class="form-control" placeholder="Surname" />
                                        <input type="hidden" name="surname" id="pass2" value="<?php print $studentInfo['surname']; ?>" class="form-control" placeholder="Surname" />
                                    </div>
                                    <div class="m-t-10">
                                        <input type="" name="firstName" value="<?php print $studentInfo['firstName']; ?>" class="form-control"
                                            data-parsley-equalto=""
                                            placeholder="First Name" />
                                    </div>
                                    <div class="m-t-10">
                                        <input type="" name="lastName" class="form-control" value="<?php print $studentInfo['lastName']; ?>" name="lastname"
                                            data-parsley-equalto="#pass2"
                                            placeholder="Last Name" />
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div><label>Date of Birth </label>
                                        <input type="date" name="dob" value="<?php print $studentInfo['dob']; ?>" class="form-control"
                                            parsley-type="" placeholder="Date of birth" />
                                        <label>Place of Birth</label>
                                        <input type="text" name="pob" value="<?php print $studentInfo['pob']; ?>" class="form-control"
                                            parsley-type="" placeholder="Place of birth" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div>
                                        <select parsley-type="" type="text" name="gender" class="form-control"
                                            placeholder="">
                                            <option selected="selected"></option>
                                            <option selected="" value="<?php if ($studentInfo['gender'] == "M") { print "M";} else {print "F";} ?>"><?php if ($studentInfo['gender'] == "M") { print "Male";} else { print "Female";} ?></option>
                                            <option value="F">Female</option>
                                            <option value="A">Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <div>
                                        <input data-parsley-type="" value="<?php print $studentInfo['nationality']; ?>" name="country" type="text"
                                            class="form-control"
                                            placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>State of Origin</label>
                                    <div>
                                        <input data-parsley-type="" value="<?php print $studentInfo['state']; ?>" name="state" type="text"
                                            class="form-control"
                                            placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <div>
                                        <input data-parsley-type="alphanum" name="phone" value="<?php print $studentInfo['phone']; ?>" type="tel"
                                            class="form-control"
                                            placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Home Address</label>
                                    <div>
                                        <textarea class="form-control" rows="5" name="address"><?php print $studentInfo['address']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password/Pin</label>
                                    <div>
                                        <input class="form-control" maxlength="6" value="<?php print $studentInfo['password']; ?>" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Student Status</label>
                                    <div>
                                        <select name="status" class="form-control" id="">
                                            <option value="" <?php if ($studentInfo['status'] == "") echo 'selected'; ?>>Choose an option</option>
                                            <option value="" <?php if ($studentInfo['status'] == "") echo 'selected'; ?>>Enable</option>
                                            <option value="Disable" <?php if ($studentInfo['status'] == "Disable") echo 'selected'; ?>>Disable</option>
                                        </select>




                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="change" onchange="myfunction()" name="update-student" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                        <div id="result_screen" class="alert alert-success" style="display: none"></div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <!-- Disable by Session and term and class-->
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Student Information</h4>
                            <p class="sub-title"></p>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label class="control-label"> Session</label>
                                    <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                                        <option value="">Select a session</option>
                                        <?php foreach ($mySessions as $mySession) { ?>
                                            <option value="<?php print $mySession['session']; ?>"><?php print $mySession['session']; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="control-label"> Class</label>
                                    <select id="classSelect" type="text" required="required" a value="" class="form-control" name="class">
                                        <option value="">Select a class</option>
                                        <?php
                                        foreach ($myClasses as $myClass) {
                                        ?>
                                            <option value="<?php echo $myClass['class']; ?>"><?php echo $myClass['class']; ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Student Status</label>
                                    <div>
                                        <select name="status" class="form-control" id="">
                                            <option value="">Choose an option</option>
                                            <option value="" <?php if ($studentInfo['status'] == "") echo 'selected'; ?>>Enable</option>
                                            <option value="Disable" <?php if ($studentInfo['status'] == "Disable") echo 'selected'; ?>>Disable</option>
                                        </select>




                                    </div>
                                </div>
                                <input type="hidden" name="admissionNo" value="<?php print $studentInfo['admissionNo']; ?>">
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary" name="disable" style="float: right;" class="btn-submit">Disable</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </form>
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Other Info</h4>
                            <p class="sub-title"></p>

                            <form action="updateProfilePix.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="admissionNo" value="<?php print $_GET['admissionNo']; ?>">
                                <div class="form-group">
                                    <div class="edit-profile-photo">
                                        <?php if ($studentInfo['passport'] == "") { ?> <img src="passport/images.jfif" alt="" class="img-responsive" style="border-radius: 50%; margin-left: 28%;"><?php } else { ?>
                                            <center><img src="passport/<?php print $studentInfo['passport']; ?>" alt="" class="img-responsive" style="border-radius: 50%; width: 30vw; "><?php } ?></center>
                                            <center>
                                                <div class="change-photo-btn btn btn-primary">
                                                    <div class="photoUpload">
                                                        <span>
                                                            <i class="fa fa-upload"></i>

                                                        </span>
                                                        <input type="file" name="profile-pix">
                                                    </div>
                                                </div>
                                            </center>

                                    </div>
                                    <center> <button class="listing-btn-large center" >Update profile picture</button></center>
                                </div>
                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>
<?php include 'modal.php'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#updateStudentProfile').on('submit', function(e) {

            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '$studentController->update($session, $class);',
                data: $('#updateStudentProfile').serialize(),
                success: function(data) {
                    $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //=== Show Success Message==
                    // alert("successful");

                },
                error: function(data) {
                    $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //===Show Error Message====
                    // alert("Fail");

                }

            });

        });

    });
</script>

</html>