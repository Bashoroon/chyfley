<?php include 'call_php_function.php';
include 'header.php';?>


<body>
    <?php include 'navigationMenu.php';
 ?>

    <div class="wrapper">
        <div class="container" style="margin-top: 3%;">
            <div class="card m-b-30">
                <div class="card-body">

                    <center>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <?php if ($aStaff['passport'] == "") { ?>
                                        <img src="images/chyf_logo.png" alt="user" class="rounded-circle" style="height: 100px; width: 100px; object-fit: cover;">
                                    <?php  } else { ?>
                                        <img src="<?php print $aStaff['passport']; ?>" alt="user" class="rounded-circle" style="height: 100px; width: 100px; object-fit: cover;">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <label class="control-label">Display Picture</label>*
                                <form action="updateTeacherDP.php" method="POST" enctype="multipart/form-data">
                                    <input type="file" name="passport">
                                    <input id="demo1" value="<?php print $aStaff['id']; ?> " type="hidden" class="form-control" name="id">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>

                        </div>


                    </center>
              
                <form  method="POST" enctype="multipart/form-data">         
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">

                                

                                    <label class="control-label">Teacher's Name</label>*
                                    <input id="demo1" value="<?php print $aStaff['name']; ?> " required="required" type="text" value="" class="form-control" name="name">
                                    <input id="demo1" value="<?php print $aStaff['id']; ?> " type="hidden" value="" class="form-control" name="id">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Phone</label>*
                                <input id="demo1" value="<?php print $aStaff['phone']; ?>" required="required" type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Teacher's Email</label>
                                <input id="demo1" value="<?php print $aStaff['email']; ?> " type="email" class="form-control" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">School Attended</label>*
                                <input id="demo1" value="<?php print $aStaff['sch_attended']; ?>" type="text" class="form-control" name="sch_attended">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Year of Graduation</label>*
                                <input id="demo1" value="<?php print $aStaff['year']; ?>" type="number" class="form-control" name="year">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Certificate</label>*
                                <select id="demo1" type="" class="form-control" name="cert">

                                    <option value="">Select an Option</option>
                                    <option value="B.sc" <?php if ($aStaff['cert'] == "B.sc") echo "selected"; ?>>B.sc</option>
                                    <option value="B.Eng" <?php if ($aStaff['cert'] == "B.Eng") echo "selected"; ?>>B.Eng</option>
                                    <option value="B.A" <?php if ($aStaff['cert'] == "B.A") echo "selected"; ?>>B.A</option>
                                    <option value="HND" <?php if ($aStaff['cert'] == "HND") echo "selected"; ?>>HND</option>
                                    <option value="B.Ed" <?php if ($aStaff['cert'] == "B.Ed") echo "selected"; ?>>B.Ed</option>
                                    <option value="M.sc" <?php if ($aStaff['cert'] == "M.sc") echo "selected"; ?>>M.sc</option>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Username</label>*
                                <input id="demo1" value="<?php print $aStaff['username']; ?>" required="required" type="text" value="" class="form-control" name="username">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Password</label>*
                                <input id="demo1" value="<?php print $aStaff['password']; ?>" type="password" required="required" value="" class="form-control" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Next Of Kin</label>
                                <input id="demo1" type="text" value="<?php print $aStaff['kin']; ?>" class="form-control" name="kin">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Address </label>
                                <textarea id="demo1"  class="form-control" name="kin_address"><?php print $aStaff['kin_address']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Phone </label>
                                <input id="demo1" type="tel" value="<?php print $aStaff['kin_phone']; ?>" class="form-control" name="kin_phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Discipline</label>
                                <input id="demo1" type="" value="<?php print $aStaff['discipline']; ?>" class="form-control" name="discipline">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Role</label>*
                                <select id="" type="text" <?php if($aStaff['role'] != "Admin"){echo "disable";}?> disabled="" class="form-control" name="role">
                                    <option value=""><?php print $aStaff['role']; ?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Assign Subject</label>*
                                <select id="assignSub" name="subject[]" required="required" class="form-control" multiple>
                                    <option value="">Select a subject</option>
                                    <?php
                                    $sqlsubject = $conn->query("SELECT * FROM subject");
                                    while ($subject = mysqli_fetch_array($sqlsubject)) {
                                        $subjectValue = $subject['subject'];
                                        $selected = in_array($subjectValue, $assignedSubjects) ? 'selected' : '';
                                        echo '<option value="' . $subjectValue . '" ' . $selected . '>' . $subjectValue . '</option>';

                                    }
                                    ?>
                                </select>>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Signature</label>*<br>
                                <input type="file" value="<?php print $aStaff['signature']; ?>" name="signature">
                                </div>
                            </div>


                        </div>
                       
                        <div class="row">
                            <div class="col-12">
                            <button type="submit" name="update-staff" class="btn btn-primary" style="float: right;">Save</button>
                            </div>
                        </div>

                        
                    </div>

                </form> 
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
<?php include 'modal.php';
?>