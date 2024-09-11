<?php include 'call_php_function.php';
include 'header.php';
$session = $_GET['session'];
$term = $_GET['term'];
$class = $_GET['class'];
$subject = $_GET['subject'];
?>

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
    <?php $noteid = $_GET['id']; ?>
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


                <div class="col-lg-4">TOPICS
                    <div class="card m-b-30">
                        <div class="card-body">

                            <?php $sqlTopic = $conn->query("select * from enote where term='$term' and class='$class' and subject='$subject'");
                            while ($topic = mysqli_fetch_array($sqlTopic)) { ?>
                                <div> <a href="<?php print $topic['pdf_path']; ?>" target="_blank"><?php print $topic['topic']; ?></a></div><?php } ?>





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