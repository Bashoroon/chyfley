<?php include 'header.php'; ?>

<style type="text/css">
    textarea {
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: -moz-none;
        -o-user-select: none;
        user-select: none;
        overflow: auto;


    }
</style>

<body>
    <?php $noteid = $_GET['noteid']; ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">


    <!-- Navigation Menu-->
    <?php include 'navigationMenu.php'; ?>
    <!-- Navigation Menu-->


    <div class="wrapper">
        <div class="container-fluid">
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
                <div class="col-lg-8">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <?php $sqlNote = $conn->query("select * from enote where id='$noteid' ");
                            $note = mysqli_fetch_array($sqlNote); ?>
                            <h4 class="mt-0 header-title">E-note for <?php print $note['class']; ?> - <?php print $note['term']; ?>Term</h4>
                            <h3 class="mt-0 header-title"><?php print $note['subject']; ?> </h3>
                            <p class="sub-title"></p>
                            <form action="updateEnote.php" method="POST" id="newAdd2s">
                                <h4 class="mt-0 header-title">NOte</h4>
                                <input class="form-control" readonly style="font-weight: bold;" type="" name="topic" value="<?php print $note['topic']; ?>">
                                <input type="hidden" name="noteid" value="<?php print $note['noteid']; ?>">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">NOte</h4>



                                        <?php print $note['note']; ?>
                                        <iframe src='<?php print $note['pdf_path']; ?>' width='100%' height='600'></iframe>



                                    </div>
                                </div>


                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            update
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

                <div class="col-lg-4">TOPICS
                    <div class="card m-b-30">
                        <div class="card-body">

                            <?php
                            $session = $note['session'];
                            $sqlTopic = $conn->query("select * from enote where session='" . $note['session'] . "' and term='" . $note['term'] . "' and class='" . $note['class'] . "' and subject='" . $note['subject'] . "' ");
                            while ($topic = mysqli_fetch_array($sqlTopic)) { ?>
                                <div style="font-weight: bold;"> <a href="viewEditEnote.php?noteid=<?php print $topic['id']; ?>" class=" summersnote" name=""><?php print $topic['topic']; ?></a></div><br><?php } ?>



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
    <script>
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
    <?php include 'footer.php'; ?>

</body>
<?php include 'modal.php'; ?>


</html>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>


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