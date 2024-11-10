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
                            
                            <h4 class="mt-0 header-title"></h4>
                            <p class="sub-title"></p>
                            <form  method="POST">
                                <input type="hidden" name="session" id="inputsession" class="form-control" value="<?php print $_GET['session']; ?>">
                                <input type="hidden" name="term" id="inputterm" class="form-control" value="<?php print $_GET['term']; ?>">
                                <input type="hidden" name="class" id="inputclass" class="form-control" value="<?php print $_GET['class']; ?>">
                                <input type="hidden" name="subject" id="inputsubject" class="form-control" value="<?php print $_GET['subject']; ?>">
                                <input type="hidden" name="exam_type" id="inputsubject" class="form-control" value="<?php print $_GET['examType']; ?>">

                                <?php  ?>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mt-0 header-title">Question</h4>
                                        <textarea class="question" name="ques"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">
                                        <h4 class="mt-0 header-title">Option A</h4>
                                        <textarea class="optionA" name="optionA"> </textarea>
                                    </div>
                                    <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">
                                        <h4 class="mt-0 header-title">Option B</h4>
                                        <textarea class="optionB" name="optionB"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">
                                        <h4 class="mt-0 header-title">Option C</h4>
                                        <textarea class="optionC" name="optionC"></textarea>
                                    </div>
                                    <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">
                                        <h4 class="mt-0 header-title">Option D</h4>
                                        <textarea class="optionD" name="optionD"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">
                                        <h4 class="mt-0 header-title">Option E</h4>
                                        <textarea class="optionE" name="optionE"></textarea>
                                    </div>
                                    <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">
                                        <h4 class="mt-0 header-title">Answer</h4>
                                        <textarea class="form-control" name="answer"></textarea>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <div>
                                        <button type="submit" name="add-ques" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                        <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">
                                <h5>(Uload CSV)</h5>
                                <p style="color:red">This is recommended</p>
                                <form  method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">

                                    <input type="hidden" name="session" id="inputsession" class="form-control" value="<?php print $_GET['session']; ?>">
                                    <input type="hidden" name="term" id="inputterm" class="form-control" value="<?php print $_GET['term']; ?>">
                                    <input type="hidden" name="class" id="inputclass" class="form-control" value="<?php print $_GET['class']; ?>">
                                    <input type="hidden" name="subject" id="inputsubject" class="form-control" value="<?php print $_GET['subject']; ?>">
                                    <input type="hidden" name="examType" id="inputsubject" class="form-control" value="<?php print $_GET['examType']; ?>">
                                <div class="row">                                    
                                    <div class="col-12">
                                        <input type="file" name="file" id="file" accept=".xls,.xlsx,.csv" required="required">
                                        <button type="submit" id="submit" name="uploadCVSQues" class="btn btn-success">Upload</button>
                                    </div>
                                </div>

                                </form>
                            </div>
                           

                            <div class="col-lg-6 col-12 col-md-12 col-sm-12 ">

                            <h5>(Upload docx)</h5>
                            <p style="color:red">Alternative</p>
                                <form method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">


                                    <input type="hidden" name="session" id="inputsession" class="form-control" value="<?php print $_GET['session']; ?>">
                                    <input type="hidden" name="term" id="inputterm" class="form-control" value="<?php print $_GET['term']; ?>">
                                    <input type="hidden" name="class" id="inputclass" class="form-control" value="<?php print $_GET['class']; ?>">
                                    <input type="hidden" name="subject" id="inputsubject" class="form-control" value="<?php print $_GET['subject']; ?>">
                                    <input type="hidden" name="examType" id="inputsubject" class="form-control" value="<?php print $_GET['examType']; ?>">

                                    <div class="row">
                                        <div class="col-12">
                                            <input type="file" name="file" id="file" accept=".docx" required="required">
                                            <button type="submit" name="uploadMS"  class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

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