
<?php include 'db.php';?>
<?php session_start();
  $user = $_SESSION['username'];
   
  
if (!isset($_SESSION['username'])){;
   header('location:login.php');   
}?><!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'header.php';?>
</head>

<body>

  <script> var $jq = jQuery.noConflict(); </script>   
    <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                <div class="col-lg-5">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?php if (isset($_GET['s'])) {
                                echo "<h5>Assignment added successfully<h5>";
                            }?>
                            <h4 class="mt-0 header-title">Assignment</h4>
                            <p class="sub-title"></p>

                            <form  action="submit-assignment.php" method="POST">
                               

                                

                                <div class="form-group">
                                    <label>Session</label>
                                    <div>
                                        <input type="text" name="session" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Term</label>
                                    <div>
                                        <input type="text" name="term"  class="form-control"
                                               required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Class</label>
                                    <div>
                                        <input type="text" name="class"  class="form-control" required="required">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label>Subject</label>
                                    <div>
                                        <input type="text" name="subject" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date To Be Submitted</label>
                                    <div>
                                        <input type="date" name="dates" class="form-control" required="required">
                                    </div>
                                </div>
                                
                                
                                   
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">Question</h4>
                                               
                                               
                                                    <textarea class="summernote" name="questions"></textarea>
                                                

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
                <?php
                $sqlselect = $conn->query("SELECT * FROM assignment order by datez desc");?>
               

                <div class="col-lg-7">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Assignment</h4>
                          
                            <table id="datatSable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;  overflow-y: scroll; display: inline-block;">
                                <thead>
                                <tr>
                                    <th>Session</th>
                                    <th>Term</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Questions</th>
                                    <th>Date Assigned</th>
                                    <th>Date To Be Submitted</th>
                                     <th>Delete</th>
                                                                
                                       
                                </tr>
                                </thead>


                                <tbody><?php
                                     while ($select = mysqli_fetch_array($sqlselect)){;?>
                                <tr>
                                    <td><?php print $select['session'];?></td>
                                    <td><?php print $select['term'];?></td>
                                    <td><?php print $select['class'];?></td>
                                    <td><?php print $select['subject'];?></td>
                                    <td class="summernote"><?php print $select['questions'];?></td>
                                    <td><?php print $select['datez'];?></td>
                                    <td><?php print $select['dates'];?></td>
                                      <td><button class="btn btn-danger">Delete</button></td>
                                   
                                   
                                </tr>
                               <?php }?>
                                </tbody>
                            </table>

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
<?php include 'footer.php';?>

</body>
 <?php include 'modal.php';?>


</html>
<script src="plugins/summernote/summernote-bs4.min.js"></script>

 
<script>
    initSample();
</script>
<script>

     $('document').ready(function()
            {

    $('.summernote').summernote({
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
