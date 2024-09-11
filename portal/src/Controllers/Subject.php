<?php
namespace Controllers\Subject;


//error_reporting(0);
class Subject
{
    

function create(){
 global $conn;
    $subject = $_POST['subject'];
 
$sqlsubject = $conn->query ("select * from subject where subject='$subject'");
   $row = mysqli_num_rows($sqlsubject);
 if ($row > 0) 
{ 
return "<span class='alert alert-danger float-right'>Subject Exists</span>";
 
}

else
{
$sql = "INSERT INTO subject (subject)
VALUES ('$subject')";
  ($conn->query($sql) === TRUE)  or die('unable to add subject');

 return "<span class='alert alert-success float-right'>Subject Added</span>";
    
}
}

function show(){
    global $conn;
    $data = array();
    $sqlsubject = $conn->query("select * from subject");
    while ($subject = mysqli_fetch_array($sqlsubject)) { 
        $data[] = $subject;
        
    }
    return $data;
}

public function subject_teacher($username){
  global $conn;

  $sqlSubject = $conn->query("select subject from users where username='$username'");
  while ($nameFound = mysqli_fetch_array($sqlSubject)) {
      $data[] = $nameFound;
  }
  return $data;
}

function update($id, $subject){
  global $conn;
   
$sqlsubject = $conn->query ("select * from subject where subject='$subject'");
$row = mysqli_num_rows($sqlsubject);
if ($row > 0) { 
return "<span class='alert alert-danger float-right'>Subject Exists</span>";
//header('location:allSubjects.php?e');

}
else
{
  $update = $conn->query("update subject set subject='$subject' where  id='$id' ");
 
}

return "<span class='alert alert-success float-right'> Subject updated</span>";
// header('location:allSubjects.php'); //if submitted then redirect


}

function delete($id){
global $conn;
  $delete = "DELETE FROM subject where id = '$id'";
  if ($conn->query($delete) === TRUE) {
    return "<span class='alert alert-danger float-right'> Subject Deleted</span>";
  }
}
}