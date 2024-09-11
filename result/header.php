<?php
if (!isset($_SESSION['admissionNo'])) {
  echo '<script type="text/javascript">
           window.location = "student-login.php"
      </script>';
}
$user = $_SESSION['admissionNo'];
?>
 <style>
     .rounded-circle {
    border-radius: 50%;
    width: 100px; /* Adjust the width as needed */
    height: 100px; /* Adjust the height to match the width */
    object-fit: cover; /* Ensure the image covers the entire circle */
}

 </style>
   <head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CHYFLEY SCHOOLS - STUDENT PORTAL </title>
    <meta name="Description" content="Poised to Making Giant Strides">
    <meta name="Author" content="CHYFLEY SCHOOLS">
	<meta name="keywords" content="CHYFLEY SCHOOLS - Poised to Making Giant Strides">
    
    <!-- Favicon -->
    <link rel="icon" href="https://portal.chyfleyschools.com.ng/images/chyf_logo.png" type="image/x-icon">
      <!-- DataTables -->
    <link href="https://portal.chyfleyschools.com.ng/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://portal.chyfleyschools.com.ng/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="https://portal.chyfleyschools.com.ng/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="https://portal.chyfleyschools.com.ng/plugins/morris/morris.css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>

