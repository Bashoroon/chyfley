<?php 
include 'db.php';
$name = $_POST['name'];
$username= $_POST['username'];
$email= $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];
$sch_attended = $_POST['sch_attended'];
$year = $_POST['year'];
$cert = $_POST['cert'];
$kin = $_POST['kin'];
$kin_phone = $_POST['kin_phone'];
$kin_address = $_POST['kin_address'];
$discipline = $_POST['discipline'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];


    // Define random digit
    $random_digit = uniqid(); // Generate a unique identifier

    // Signature file upload
    $file_name = $_FILES['signature']['name'];
    $target_dir = "signature_images/";
    $target_file = $target_dir . $random_digit . '_' . basename($_FILES["signature"]["name"]); // Add random digit to the file name

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType, $extensions_arr) ){
        // Upload file
        move_uploaded_file($_FILES['signature']['tmp_name'], $target_file);
    }

   
    // Update user record in the database
    $sqlUpdate = $conn->query ("UPDATE users SET name='$name', username='$username', email='$email', password='$password', signature='$target_file', phone='$phone', sch_attended='$sch_attended', year='$year', cert='$cert', kin='$kin', kin_address='$kin_address', kin_phone='$kin_phone', discipline='$discipline', subject='$subject' WHERE id='$id'");
    
    // Redirect to editMyProfile.php with the updated user ID
    header("location: editMyProfile.php?id=$id");

?>