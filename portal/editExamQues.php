<?php include 'call_php_function.php';
include 'header.php'; ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


<body>



    <!-- Navigation Bar-->

    <?php require_once 'navigationMenu.php'; ?>
    <!-- End Navigation Bar-->

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <center> <img src="images/exam_logo.png" style="width: 80%; height: auto;" alt="CHYFLEY LOGO"></center>
                </div>
            </div>

            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"></h4>
                    </div>

                </div>
                <!-- end row -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4><?php if (!isset($_GET['id'])) {
                                    print $_GET['session'] . ' ' . $_GET['term'] . ' ' . $_GET['class'] . ' ' . $_GET['subject'];
                                } ?></h4>
                            <?php if (isset($_GET['s'])) {
                                echo "<h5>E-note added successfully<h5>";
                            } ?>
                            <h4 class="mt-0 header-title"></h4>
                            <p class="sub-title"></p>
                            <?php $sqlNote = $conn->query("select * from questionbank where quesid='" . $_GET['id'] . "' ");
                            $ques = mysqli_fetch_array($sqlNote); ?>
                            <form action="updateExamQues.php" method="POST">
                                <?php if (!isset($_GET['id'])) { ?>
                                    <input type="hidden" name="session" id="inputsession" class="form-control" value="<?php print $_GET['session']; ?>">
                                    <input type="hidden" name="term" id="inputterm" class="form-control" value="<?php print $_GET['term']; ?>">
                                    <input type="hidden" name="class" id="inputclass" class="form-control" value="<?php print $_GET['class']; ?>">
                                    <input type="hidden" name="subject" id="inputsubject" class="form-control" value="<?php print $_GET['subject']; ?>">
                                    <input type="hidden" name="exam_type" id="inputsubject" class="form-control" value="<?php print $_GET['examType']; ?>">

                                    <?php } ?>`
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="mt-0 header-title">Question</h4>
                                            <textarea class="question" name="ques"><?php if (isset($_GET['id'])) {
                                                                                        print $ques['question'];
                                                                                    } ?></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="quesid" id="inputsubject" class="form-control" value="<?php print $ques['quesid']; ?>">

                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="mt-0 header-title">Option A</h4>
                                            <textarea class="optionA" name="optionA"> <?php if (isset($_GET['id'])) {
                                                                                            print $ques['optionA'];
                                                                                        } ?></textarea>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="mt-0 header-title">Option B</h4>
                                            <textarea class="optionB" name="optionB"><?php if (isset($_GET['id'])) {
                                                                                            print $ques['optionB'];
                                                                                        } ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="mt-0 header-title">Option C</h4>
                                            <textarea class="optionC" name="optionC"><?php if (isset($_GET['id'])) {
                                                                                            print $ques['optionC'];
                                                                                        } ?></textarea>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="mt-0 header-title">Option D</h4>
                                            <textarea class="optionD" name="optionD"><?php if (isset($_GET['id'])) {
                                                                                            print $ques['optionD'];
                                                                                        } ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="mt-0 header-title">Option E</h4>
                                            <textarea class="optionE" name="optionE"><?php if (isset($_GET['id'])) {
                                                                                            print $ques['optionE'];
                                                                                        } ?></textarea>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="mt-0 header-title">Answer</h4>
                                            <textarea class="form-control" name="answer"><?php if (isset($_GET['id'])) {
                                                                                                print $ques['answer'];
                                                                                            } ?></textarea>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>

                        <?php if (!isset($_GET['id'])) { ?>
                            <h5>or</h5>

                            <form action="uploadMS.php" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">


                                <input type="hidden" name="session" id="inputsession" class="form-control" value="<?php print $_GET['session']; ?>">
                                <input type="hidden" name="term" id="inputterm" class="form-control" value="<?php print $_GET['term']; ?>">
                                <input type="hidden" name="class" id="inputclass" class="form-control" value="<?php print $_GET['class']; ?>">
                                <input type="hidden" name="subject" id="inputsubject" class="form-control" value="<?php print $_GET['subject']; ?>">

                                <div class="row">
                                    <div class="col-12">
                                        <input type="file" name="file" id="file" accept=".xls,.xlsx" required="required">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                            </form>
                    </div>
                <?php } ?>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
    </div> <!-- end row -->
    </div> <!-- end row -->

    </div>
    <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>
<?php include 'modal.php'; ?>



</html>