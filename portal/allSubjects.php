<?php 
include 'call_php_function.php';
include 'header.php';


?>

 


<body>

    <?php include 'navigationMenu.php'; ?>

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">

                </div>
                <!-- end row -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                        
                           <?php 
                         
                            print $response;
                        
                            ?>
                          
                               
                            <h4 class="mt-0 header-title">All Subject</h4>
                           

                            <table id="score-sheet" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Subject</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($subjects as $subject) { ?>
                                        <tr>

                                            <td><?php print $no++; ?></td>
                                            <td><?php print $subject['subject']; ?></td>
                                            <td>
                                                <div class="btn-group mso-mb-2">
                                                    <form action="" method="POST">
                                                        <input type="hidden" value="<?php print $subject['id']; ?>" name="id">
                                                        <button type="submit" class="btn btn-primary waves-light waves-effect delete" title="Delete" name="delete-subject" onclick="return confirmation()"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                    <a href="#" data-id="<?php echo $subject['id']; ?>" data-subject="<?php echo $subject['subject']; ?>" class="editSubjectBtn" data-toggle="modal" data-target=".editSubject">
                                                        <button title="Edit Subject" type="button" class="btn btn-primary waves-light waves-effect">
                                                            <i class="mdi mdi-pencil-circle"></i>
                                                        </button>
                                                    </a>

                                                </div>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
    <?php include 'footer.php';
    include 'modal.php';
    ?>
</body>



<script>
    $(document).ready(function(){
        $('.editSubjectBtn').on('click', function(){
            // Get the data-id and data-subject attributes from the clicked element
            var id = $(this).data('id');
            var subject = $(this).data('subject');
            
            // Populate the modal form fields
            $('input[name="subject"]').val(subject);
            $('input[name="id"]').val(id);
            
            // Modify the form action URL to include the ID for editing
            // $('#processSubject').attr('action', 'editSubject.php?id=' + id);
        });
    });


</script>

</html>