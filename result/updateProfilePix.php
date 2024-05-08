<?php 
include 'db.php';
$id = $_POST['id'];



$random_digit= rand(0000,9999999);

$path = "../excel/passport/".$random_digit;


  $file_name = $_FILES['profile-pix']['name'];

  $target_dir = "../excel/passport/";

  $target_file = $target_dir.basename($_FILES["profile-pix"]["name"]);


  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

if ($_FILES["profile-pix"]["size"] > 20480) {
    die ("Sorry, your file is too large. Your file must not be more than 20kb");
    $uploadOk = 0;
}
  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
    
     // Upload file
     move_uploaded_file($_FILES['profile-pix']['tmp_name'],$path.'.'.$imageFileType);

     
  }

$sqlUpdate = $conn-> query("update studentusers set passport='$random_digit.$imageFileType' where admissionNo='$id'  ") or die(mysqli_error($conn));

echo "<script>
alert('Updated Successfully!');
window.location.href=' index.php?s';
</script>";
 ?>
