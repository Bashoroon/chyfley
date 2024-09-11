<?php include 'db.php';
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'header.php'; ?>
</head>
<?php

$findUserName= $conn->query("select * from studentusers where admissionNo ='$user'");

$usernName= mysqli_fetch_array($findUserName);
    ?>

<body>

    
<?php require 'nav.php'; ?>
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
<div class="row" style="margin-top: -120px;">
   <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-6">
    <img src="../images/tender-logo.png" height="200px;" style="display: block; margin-left: auto;margin-right: auto; ">
    </div>
</div>
            <div class="row">

                     <?php
                $sqlselect = $conn->query("SELECT * FROM assignment order by datez desc ");?>
               

                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Assignment</h4>
                          
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;  overflow-y: scroll; display: inline-block; ">
                                <thead>
                                <tr>
                                    <th>Session</th>
                                    <th>Term</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Questions</th>
                                    <th>Date Assigned</th>
                                    <th>Date To Be Submitted</th>
                                     
                                                                
                                       
                                </tr>
                                </thead>


                                <tbody><?php
                                     while ($select = mysqli_fetch_array($sqlselect)){;?>
                                <tr>
                                    <td><?php print $select['session'];?></td>
                                    <td><?php print $select['term'];?></td>
                                    <td><?php print $select['class'];?></td>
                                    <td><?php print $select['subject'];?></td>
                                    <td><?php print $select['questions'];?></td>
                                    <td><?php print $select['datez'];?></td>
                                    <td><?php print $select['dates'];?></td>
                                      
                                   
                                   
                                </tr>
                               <?php }?>
                                </tbody>
                            </table>
 <form method="POST" action="processAssignment.php">

                              <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Submit Assignment</h4>
                    
                           
                                <input type="" disabled="disabled" name="name" value="<?php print $usernName['surname'];?> <?php print $usernName['firstName'];?> <?php print $usernName['lastName'];?>" class="form-control" placeholder="input your name" >
                                <input type="hidden"  name="name" value="<?php print $usernName['surname'];?> <?php print $usernName['firstName'];?> <?php print $usernName['lastName'];?>" class="form-control" placeholder="input your name" >
                                <textarea id="elm1" name="message" ></textarea><br>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                          
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->    
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
   <?php include 'footer.php';?>
    <script src="../portal/plugins/tinymce/tinymce.min.js"></script>
    <script>
        $(document).ready(function () {
            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>
</body>

</html>