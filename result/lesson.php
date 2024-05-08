<?php include 'db.php';
$term  = $_GET['term'];
$class = $_GET['class'];
error_reporting(E_ERROR);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'header.php';?>
    
</head>
<style type="text/css">
      #disable {
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
  
                  
        <!-- Navigation Bar-->
       <?php include 'nav.php';?>
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
                <div class="col-lg-8">
                    <div class="card m-b-30">
                        <div class="card-body">
                            
                            <?php $sqlNote= $conn->query("select * from enote where term='".$_GET['term']."' and class='".$_GET['class']."' and noteid='".$_GET['noteid']."'   ");
                                $note = mysqli_fetch_array($sqlNote);
                               ?>
                                <?php if (isset($_GET['class'])) {
                                ?>
                                   
                                
                            <h4 class="mt-0 header-title">E-note for <?php print $note['class'];?>, <?php print $note['term'];?>Term</h4> <h3 class="mt-0 header-title"><?php print $note['subject'];?> </h3>
                            <p class="sub-title"></p> <?php } ?>    

                           
                                                                   
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">NOte</h4>
                                            
                           
      
                                              
<!--<div id="disable">-->
   
<!--<iframe src='<?php print $note['pdf_path'];?>' </iframe>-->
<!--</div>-->
                                                    
                                                    
                                                

                                            </div>
                                        </div>
                                
                              
                             

                        </div>
                    </div>
                </div> <!-- end col -->


                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
 <?php $sqlSub= $conn->query("select * from enote where term='".$_GET['term']."' and class='".$_GET['class']."' group by subject ");
                               ?>
                            <h4 class="mt-0 header-title">subject->topic</h4>
                            <p class="sub-title">Select topic to read from subject</p>
                            <?php while ($sub = mysqli_fetch_array($sqlSub)){?>
                            <div id="accordion">
                                <div class="card mb-0">
                                    
                                    <div class="card-header" id="headingOne<?php print $sub['id'];?>">
                                        <h5 class="mb-0 mt-0 font-14">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapseOne<?php print $sub['id'];?>" aria-expanded="false"
                                                aria-controls="collapseOne<?php print $sub['id'];?>" class="text-dark">
                                                <?php print $sub['subject'];?>
                                            </a>
                                        </h5>
                                    </div>
                                   
                                  <?php $sqlTopic= $conn->query("select * from enote where term='".$_GET['term']."' and class='".$sub['class']."' and subject='".$sub['subject']."' "); ?>
                                   <?php while ($topic= mysqli_fetch_array($sqlTopic)){?>
                                    <div id="collapseOne<?php print $sub['id'];?>" class="collapse "
                                            aria-labelledby="headingOne<?php print $sub['id'];?>" data-parent="#accordion">
                                        <div class="card-body">
                                          <a  href="<?php print $topic['pdf_path'];?>" target="_blank"> <?php print $topic['topic'];?></a>
                                      
                                      
                                        </div>
                                    </div><?php } ?>
                                </div>    
                            </div> <?php }?>
                       
                        </div>
                    </div>
                </div>
            </div>
          
               </div> <!-- end row -->  
            </div> <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->
 <?php require '../portal/footer.php';?>
   <?php require '../portal/modal.php';?>
    <!-- Footer -->
 

</body>
</html>
