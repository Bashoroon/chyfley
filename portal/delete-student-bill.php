<?php require 'db.php';
$id = $_GET['id'];	

// sql to delete a record
$sql = "DELETE FROM studentbill WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
   
echo ("<script LANGUAGE='JavaScript'>
          window.alert('student bill succesfully deleted');
           window.location.href='all-student-bill.php;
      
       </script>");
} else {
    echo ("<script LANGUAGE='JavaScript'>
          window.alert('Oops! Something went wrong. Couldn't delete score);
           window.location.href='all-student-bill.php';
      
       </script>");
}

$conn->close();
?>