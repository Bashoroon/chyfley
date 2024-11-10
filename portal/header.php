<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CHYFLEY SCHOOLS - Poised to Making Giant Strides </title>
    <meta name="Description" content="Poised to Making Giant Strides">
    <meta name="Author" content="CHYFLEY SCHOOLS">
	<meta name="keywords" content="CHYFLEY SCHOOLS - Poised to Making Giant Strides">
   
     <link rel="shortcut icon" href="images/chyf_logo.png">
      <!-- DataTables -->
      <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Responsive datatable examples -->
    <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

   

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <style>
      .alert-custom {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
            display: none;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }

        .alert-slide-in {
            transform: translateX(100%); /* Start off-screen */
            opacity: 0; /* Hidden initially */
        }

        .alert-show {
            transform: translateX(0); /* Slide into view */
            opacity: 1; /* Fully visible */
        }
    </style>
   <div class="alert alert-custom alert-<?php echo $responseType === 'success' ? 'success' : 'danger'; ?> alert-slide-in" role="alert">
    <?php echo $response; ?>
</div>
</head>




