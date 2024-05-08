<?php include 'db.php';

$term = $_GET['term'];
$class = $_GET['class'];
// $subject = $_GET['subject'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include '../portal/header.php';
     
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
  
                        <!-- Navigation Menu-->
                      <?php include '../portal/navigationMenu.php';?>
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
                            
                            <?php $sqlNote= $conn->query("select * from enote where noteid='".$_GET['noteid']."'");
                                $note = mysqli_fetch_array($sqlNote);?>
                            <h4 class="mt-0 header-title">E-note for <?php print $note['class'];?>- <?php print $note['term'];?>Term</h4> <h3 class="mt-0 header-title"><?php print $note['subject'];?> </h3>
                            <p class="sub-title"></p>

                           
                                                                   
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">NOte</h4>
                                                <form  action="updateEnote.php" method="POST" id="newAdd2">
                           
                                
                                              

                                                    <div  name="note" stylde="max-height: 20px; overflow-y: scroll; overflow-x: scroll;"><?php print $note['note'];?></div>
                                                    
                                                

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
                            
                                        <?php $sqlTopic= $conn->query("select * from enote where session='$session' and term='$term' and class='$class' and subject='$subject'");
                               while ($topic = mysqli_fetch_array($sqlTopic)){?>
                                                    <a href="lesson.php?session=<?php print $topic['session'];?>&term=<?php print $topic['term'];?>&class=<?php print $topic['class'];?>&subject=<?php print $topic['subject'];?>" class=" summesrsnote"  name="" ><?php print $topic['topic'];?></div><?php }?>
                                                    
                                                

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

