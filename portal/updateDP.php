<?php
include 'db.php';
$id = $_POST['id'];
 // Define random digit
 $random_digit = uniqid(); // Generate a unique identifier

 // Signature file upload
 $file_name = $_FILES['passport']['name'];
 $target_dir = "passport/";
 $target_file = $target_dir . $random_digit . '_' . basename($_FILES["passport"]["name"]); // Add random digit to the file name

 // Select file type
 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

 // Check extension
 if( in_array($imageFileType, $extensions_arr) ){
     // Upload file
     move_uploaded_file($_FILES['passport']['tmp_name'], $target_file);
 }


  // Update user record in the database
  $sqlUpdate = $conn->query ("UPDATE users SET passport='$target_file' WHERE id='$id'");
    
  // Redirect to editMyProfile.php with the updated user ID
  header("location: editMyProfile.php?id=$id");


