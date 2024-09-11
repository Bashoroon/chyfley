 
 
 <script>
    
    // question
    
     $('.question').summernote({
            placeholder: 'Enter your questions',
            tabsize: 2,
            height: 50,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                }
            }
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
    
    
        $('.optionA').summernote({
            placeholder: 'Option A',
            tabsize: 2,
            height: 50,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                }
            }
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
    
        // option B
    
    
        $('.optionB').summernote({
            placeholder: 'Option B',
            tabsize: 2,
            height: 50,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                }
            }
        });
    
    
        // $jq(document).ready(function() {
        //     $jq('#newAdd2').ajaxForm({
        //         target: '#preview2',
        //         success: function() {
        //             $jq("#preview2").show();
        //             $jq("#preview2").animate({
        //                 height: '60px',
        //                 width: 'auto'
        //             });
        //         }
        //     });
        // });
    
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
    
    
        // option C
    
    
        $('.optionC').summernote({
            placeholder: 'Option C',
            tabsize: 2,
            height: 50,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                }
            }
        });
    
    
        // $jq(document).ready(function() {
        //     $jq('#newAdd2').ajaxForm({
        //         target: '#preview2',
        //         success: function() {
        //             $jq("#preview2").show();
        //             $jq("#preview2").animate({
        //                 height: '60px',
        //                 width: 'auto'
        //             });
        //         }
        //     });
        // });
    
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
    
    
    
        // Option D
    
    
    
        $('.optionD').summernote({
            placeholder: 'Option D',
            tabsize: 2,
            height: 50,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                }
            }
        });
    
    
        // $jq(document).ready(function() {
        //     $jq('#newAdd2').ajaxForm({
        //         target: '#preview2',
        //         success: function() {
        //             $jq("#preview2").show();
        //             $jq("#preview2").animate({
        //                 height: '60px',
        //                 width: 'auto'
        //             });
        //         }
        //     });
        // });
    
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
    
    
        // option E 
    
    
        $('.optionE').summernote({
            placeholder: 'Option E',
            tabsize: 2,
            height: 50,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                }
            }
        });
    
    
        // $jq(document).ready(function() {
        //     $jq('#newAdd2').ajaxForm({
        //         target: '#preview2',
        //         success: function() {
        //             $jq("#preview2").show();
        //             $jq("#preview2").animate({
        //                 height: '60px',
        //                 width: 'auto'
        //             });
        //         }
        //     });
        // });
    
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
    
    
        // Option Answer
    
        $('.answer').summernote({
            placeholder: 'Type in your Ansswer',
            tabsize: 2,
            height: 50,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                }
            }
        });
    
    
        // $jq(document).ready(function() {
        //     $jq('#newAdd2').ajaxForm({
        //         target: '#preview2',
        //         success: function() {
        //             $jq("#preview2").show();
        //             $jq("#preview2").animate({
        //                 height: '60px',
        //                 width: 'auto'
        //             });
        //         }
        //     });
        // });
    
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
       <script> 
        $(document).ready(function() {
        $('#score-sheet').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );</script>
    
       
     <footer class="footer">
            © <?php print date('Y');?> CHYFLEY SCHOOLS <span class="d-none d-sm-inline-block"> - Designed by Datapalace IT Solution</span>.
        </footer>
    
        <!-- End Footer -->
      <!--Morris Chart-->
      <script src="plugins/morris/morris.min.js"></script>
        <script src="plugins/raphael/raphael.min.js"></script>
    
        <script src="assets/pages/dashboard.init.js"></script>
    
          <!-- Required datatable js -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <script src="plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
          <script src="plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js"></script>
    
        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>  
        <!-- jQuery  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>
    
        <!-- App js -->
        <script src="assets/js/app.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#assignSub').select2({
                placeholder: 'Select Subject',
                tags: true
            });
        });
    
        $(document).ready(function() {
            $('#assignClass').select2({
                placeholder: 'Select Class',
                tags: true
            });
        });
    </script>
    <script type="text/javascript">
    function confirmation() {
        return confirm('Are you sure you want to do this?');
    }



    $(document).ready(function () {
        // Show the alert with slide-in animation
        $('.alert-custom').addClass('alert-show').fadeIn();

        // Hide the alert after 5 seconds (5000 milliseconds)
        setTimeout(function () {
            $('.alert-custom').fadeOut('slow', function() {
                $(this).removeClass('alert-show');
            });
        }, 5000);
    });
</script>
    
        
       
      
    
    
        
    