<?php include 'call_php_function.php';
include 'header.php';
include 'navigationMenu.php';
$id = $_GET['id']; ?>

<?php $sqlTeacher  = $conn->query("SELECT * from users where id ='$id' ");
$teacher = mysqli_fetch_array($sqlTeacher);
?>

<body>
    <div class="wrapper">
        <div class="container" style="margin-top: 3%;">
            <div class="card m-b-30">
                <div class="card-body">

                    <center>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <?php if ($teacher['passport'] == "") { ?>
                                        <img src="images/chyf_logo.png" alt="user" class="rounded-circle" style="height: 100px; width: 100px; object-fit: cover;">
                                    <?php  } else { ?>
                                        <img src="<?php print $teacher['passport']; ?>" alt="user" class="rounded-circle" style="height: 100px; width: 100px; object-fit: cover;">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <label class="control-label">Display Picture</label>*
                                <form action="updateTeacherDP.php" method="POST" enctype="multipart/form-data">
                                    <input type="file" name="passport">
                                    <input id="demo1" value="<?php print $teacher['id']; ?> " type="hidden" class="form-control" name="id">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>

                        </div>


                    </center>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">

                                <form action="updateTeacher.php" method="POST" enctype="multipart/form-data">

                                    <label class="control-label">Teacher's Name</label>*
                                    <input id="demo1" value="<?php print $teacher['name']; ?> " required="required" type="text" value="" class="form-control" name="name">
                                    <input id="demo1" value="<?php print $teacher['id']; ?> " type="hidden" value="" class="form-control" name="id">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Phone</label>*
                                <input id="demo1" value="<?php print $teacher['phone']; ?>" required="required" type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Teacher's Email</label>
                                <input id="demo1" value="<?php print $teacher['email']; ?> " type="email" class="form-control" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">School Attended</label>*
                                <input id="demo1" value="<?php print $teacher['sch_attended']; ?>" type="text" class="form-control" name="sch_attended">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Year of Graduation</label>*
                                <input id="demo1" value="<?php print $teacher['year']; ?>" type="number" class="form-control" name="year">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Certificate</label>*
                                <select id="demo1" type="" class="form-control" name="cert">

                                    <option value="">Select an Option</option>
                                    <option value="B.sc" <?php if ($teacher['cert'] == "B.sc") echo "selected"; ?>>B.sc</option>
                                    <option value="B.Eng" <?php if ($teacher['cert'] == "B.Eng") echo "selected"; ?>>B.Eng</option>
                                    <option value="B.A" <?php if ($teacher['cert'] == "B.A") echo "selected"; ?>>B.A</option>
                                    <option value="HND" <?php if ($teacher['cert'] == "HND") echo "selected"; ?>>HND</option>
                                    <option value="B.Ed" <?php if ($teacher['cert'] == "B.Ed") echo "selected"; ?>>B.Ed</option>
                                    <option value="M.sc" <?php if ($teacher['cert'] == "M.sc") echo "selected"; ?>>M.sc</option>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Username</label>*
                                <input id="demo1" value="<?php print $teacher['username']; ?>" required="required" type="text" value="" class="form-control" name="username">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Password</label>*
                                <input id="demo1" value="<?php print $teacher['password']; ?>" type="password" required="required" value="" class="form-control" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Next Of Kin</label>
                                <input id="demo1" type="text" value="<?php print $teacher['kin']; ?>" class="form-control" name="kin">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Address </label>
                                <textarea id="demo1" type="email" value="<?php print $teacher['kin_address']; ?>" class="form-control" name="kin_address"><?php print $teacher['kin_address']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Phone </label>
                                <input id="demo1" type="tel" value="<?php print $teacher['kin_phone']; ?>" class="form-control" name="kin_phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Discipline</label>
                                <input id="demo1" type="" value="<?php print $teacher['discipline']; ?>" class="form-control" name="discipline">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Role</label>*
                                <select id="" type="text" disabled="" class="form-control" name="role">
                                    <option value=""><?php print $teacher['role']; ?></option>
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
                                        echo '<option value="' . $subject['subject'] . '">' . $subject['subject'] . '</option>';
                                    }
                                    ?>
                                </select>Assigned Subject: <?php print $teacher['subject']; ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Signature</label>*
                                <input type="file" value="<?php print $teacher['signature']; ?>" name="signature">
                                < </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" name="image" class="bnt btn-primary" style="float: right;">Save</button>
                            </div>
                        </div>

                        </form>
                    </div>

                    <?php include 'footer.php'; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'modal.php';
?>