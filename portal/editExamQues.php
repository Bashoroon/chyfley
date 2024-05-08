<?php include 'header.php';?>
    


</head>
<style type="text/css">
      textarea {
-webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: -moz-none;
    -o-user-select: none;
    user-select: none;
 overflsow: auto;
   
  
    }
</style>
<body>
<?php 
$session = $_GET['session'];
$term = $_GET['term'];
$class = $_GET['class'];
$subject = $_GET['subject'];
?>
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

  
                        <!-- Navigation Menu-->
                      <?php include 'navigationMenu.php';?>
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
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                              
                            <?php $sqlNote= $conn->query("select * from examquestions where session='$session' and term='$term' and class='$class' and subject ='$subject'  ");
                                $note = mysqli_fetch_array($sqlNote);?>
                            <h4 class="mt-0 header-title">E-note for <?php print $note['class'];?>, <?php print $note['session'];?>, <?php print $note['term'];?> Term</h4> <h3 class="mt-0 header-title"><?php print $note['subject'];?> </h3>
                            <p class="sub-title"></p>
                           
                           <h4 class="mt-0 header-title">Examiation</h4>
                                
                             
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">Question</h4>
                                                
                             <form  action="updateExamQues.php" method="POST" id="newAdd2s">
                                     
                                
                                              <input type="hidden" name="session" value="<?php print $note['session'];?>">
                                              <input type="hidden" name="term" value="<?php print $note['term'];?>">
                                             <input type="hidden" name="class" value="<?php print $note['quesid'];?>">
                                              <input type="hidden" name="subject" value="<?php print $note['subject'];?>">
                                             
                                               
                                             

                                                    <textsarea class=" summsernote"  name="question" ><?php print $note['questions'];?></textarea>
                                                    
                                                

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
<?php include 'footer.php';?>

</body>
 <?php include 'modal.php';?>


</html>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>


<script>

     $('document').ready(function()
            {

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
     $jq(document).ready(function(){
        $jq('#newAdd2').ajaxForm( {
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
