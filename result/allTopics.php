<?php include 'db.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'header.php';
 
$session = $_GET['session'];
$term = $_GET['term'];
$class = $_GET['class'];
$subject = $_GET['subject'];    
?>
    


</head>
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
<?php $noteid= $_GET['noteid'];?>
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

  
                       <div class="header-bg">
        <!-- Navigation Bar-->
         <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo-->
                    <div>
                        <a href="index.php" class="logo">
                            <span class="logo-light">
                                    CHYFLEY PORTAL
                            </span>
                        </a>
                    </div>
                    <!-- End Logo-->

                    <div class="menu-extras topbar-custom navbar p-0">
                        
                        <ul class="navbar-right ml-auto list-inline float-right mb-0">
                            <!-- language-->
                            

                            <!-- full screen -->
                            
                            <!-- notification -->
                           
                             <li class="dropdown notification-list list-inline-item">
                                <div class="dropdown notification-list nav-pro-img">
                                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                                        
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="logout.php"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                    </div>
                                </div>
                            </li>
                           
                            <li class="menu-item dropdown notification-list list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>

                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div>
                <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">

                    <div id="navigation">

                        <!-- Navigation Menu-->
                        
                        
                        <!-- End navigation menu -->
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


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
                            
                                          <?php $sqlTopic= $conn->query("select * from enote where session='$session' and term='$term' and class='$class' and subject='$subject'");
                               while ($topic = mysqli_fetch_array($sqlTopic)){?>
                                                  <div>  <a href="lesson.php?noteid=<?php print $topic['noteid'];?>" ><?php print $topic['topic'];?></a></div><?php }?>
                                                    
                                                
                                                    
                                                

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
<?php include '../portal/footer.php';?>

</body>
 <?php include '../portal/modal.php';?>


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
