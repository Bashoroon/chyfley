<?php include 'call_php_function.php';
 include 'header.php';?>
<style type="text/css">
    textarea {
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: -moz-none;
        -o-user-select: none;
        user-select: none;
        overflow: auto;

        width: 600px;
    }
</style>

<body>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

    <!-- Navigation Menu-->
    <?php include 'navigationMenu.php'; ?>
    <!-- Navigation Menu-->


    <div class="wrapper">
        <div class="container">
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
                            <?php if (isset($_GET['s'])) {
                                echo "<h5>E-note added successfully<h5>";
                            } ?>
                            <h4 class="mt-0 header-title"></h4>
                            <p class="sub-title"></p>

                            <form action="processEnote.php" method="post" enctype="multipart/form-data">




                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Term</label>
                                            <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                                <option value="">Select a term</option>
                                                <?php $sqlterm = $conn->query("select * from term");
                                                while ($term = mysqli_fetch_array($sqlterm)) {; ?>

                                                    <option value="<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Class</label>
                                            <select id="demo1" type="text" required="required" a value="" class="form-control" name="class">
                                                <option value="">Select a class</option>
                                                <?php
                                        if ($nameFound['class'] !== "") {
                                            $sqlclass = $conn->query("select class from users where username='$username'");
                                            while ($nameFound = mysqli_fetch_array($sqlclass)) {
                                                $classes = explode(',', $nameFound['class']);
                                                foreach ($classes as $class) {
                                        ?>
                                                 <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            $sqlclass = $conn->query("select * from class");
                                            while ($class = mysqli_fetch_array($sqlclass)) {
                                                ?>
                                             <option value="<?php echo $class['class']; ?>"><?php echo $class['class']; ?></option>
                                     <?php
                                            }
                                        }
                                        ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Subject</label>
                                            <select id="demo1" type="text" required="required" a value="" class="form-control" name="subject">
                                                <option value="">Select a subject</option>
                                                <?php
                                        if ($nameFound['subject'] !== "") {
                                            $sqlSubject = $conn->query("select subject from users where username='$username'");
                                            while ($nameFound = mysqli_fetch_array($sqlSubject)) {
                                                $subjects = explode(',', $nameFound['subject']);
                                                foreach ($subjects as $subject) {
                                        ?>
                                                 <option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            $sqlsubject = $conn->query("select subject from subject");
                                            while ($subject = mysqli_fetch_array($sqlsubject)) { ?>
                                             <option value="<?php print $subject['subject']; ?>"><?php print $subject['subject']; ?></option>
                                     <?php
                                            }
                                        }
                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Topic</label>
                                            <input id="demo1" name="topic" type="text" required="required" class="form-control">

                                        </div>
                                    </div>
                                </div>
                             
        
                                      <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Upload E-Note by Topic(PDF only)</h4>

                                        <input type="file" name="pdf" accept=".pdf">

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
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end row -->

    </div>
    <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
    <script>
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
    <?php include 'footer.php'; ?>

</body>
<?php include 'modal.php'; ?>


</html>

<script src="plugins/summernote/summernote-bs4.min.js"></script>


<script>
    initSample();
</script>
<script>
    $('document').ready(function() {

        $('.summernote').summernote({
            height: 200,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['insert', ['link', 'picture', 'video']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['table', ['table']],

                ['view', ['fullscreen', 'codeview', 'help']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                }
            }
        });


    });
    $jq(document).ready(function() {
        $jq('#newAdd2').ajaxForm({
            target: '#preview2',
            success: function() {
                $jq("#preview2").show();
                $jq("#preview2").animate({
                    height: '60px',
                    width: 'auto'
                });
            }
        });
    });

    function uploadImageContent(image, editor) {
        var data = new FormData();
        data.append('image', image);
        $.ajax({
            url: 'uimage.php',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function(url) {
                var image = $('<img>').attr('src', url);
                $(editor).summernote('insertNode', image[0]);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>