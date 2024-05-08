<?php include 'db.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'header.php';
     
?>
    


</head>
<style type="text/css">
    #disable {
-webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: -moz-none;
    -o-user-select: none;
    user-select: none;
   line-height: normal;
    }

  .example {
    font-size: 3em;
    line-height: 0.5cm;
     max-width:90%;
    /*height:auto;*/
    /*position: relative;*/
    /*display:block;*/
    /*margin-right:-200%;*/
    /*width:100% !important;*/
    /*height:100% !important;*/
    /*display:block;*/
  }
}
   
</style>
<body>
<?php 

?>
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
            <?php $sqlQeues= $conn->query("select * from examquestions where quesid='".$_GET['quesid']."' ");
                                $ques = mysqli_fetch_array($sqlQeues);
                                $startDate=  $ques['startDate'];
                                $endDate=  $ques['endDate'];
                                print "";?>
                                
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <img src="../images/tender-logo.png" alt="" style="min-width: 10em; width: 50%; margin-left: 25%; margin-top: -20px;"  >
                              <center><h1 id="demo"></h1></center>
                           
                           <center> <h4 class="mt-0 header-title">Exmination for <?php print $ques['class'];?>, <?php print $ques['session'];?>, <?php print $ques['term'];?> Term</h4> <h5 class="mt-0 header-title"><?php print $ques['subject'];?> </h5></center>
                            <p class="sub-title"></p>
                           
                           <h4 class="mt-0 header-title">Examination Questions</h4>
                                
                             
                                        <div id="quzes" style="display: ndones;" class="card m-b-30">
                                            <div class="card-body"> 
                                                <h4 class="mt-0 header-title">Questions</h4>
                                                
                            
                                     
                                
                                             
                                               
                                             

                                                    <telxtarea style="font-size:3em; font-weight:bold; line-height: normal; "  class=" col-12 summsernote  example" id="disable"    ><?php print $ques['questions'];?></textarea>
                                                    
                                                

                                            </div>
                                        </div>
                                
                              
                                
                           

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
<?php include '../portal/footer.php';?>

</body>
  <?php include '../portal/modal.php';?>


</html>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

 <script>

// Set the date we're counting down to
var countDownDate = <?php 
date_default_timezone_set('Africa/Lagos');
echo strtotime($endDate) ?> * 1000;
    var now = <?php echo time() ?> * 1000;

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        // 1. JavaScript
        // var now = new Date().getTime();
        // 2. PHP
        now = now + 1000;

        // Find the distance between now an the count down date
        var distance = countDownDate - now ;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("ques").innerHTML = "<h1>Examination completed.</h1><p>Kindly submit your script to your invigilator... Goodluck!</p>";
        }else{
            $("#quess").show();
        }
    }, 1000);
    </script>


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

    