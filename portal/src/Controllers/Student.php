<?php
namespace Controllers\Student;


class Student
{

  public function create(){

global $conn;
$admissionNo = $_POST['admissionNo'];
$surname = $_POST['surname'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$session = $_POST['session'];
$class = $_POST['class'];
$gender = $_POST['gender'];
$year = date('Y');

$ySubstr = substr($year, 2); 
if ($admissionNo == "CHS/$ySubstr/") {
	$random = mt_rand(1000, 9999);
	$sqlFindStudent = $conn->query("select * from studentusers where admissionNo='$admissionNo'");
$founded = mysqli_num_rows($sqlFindStudent);
if ($founded > 0) {
// header("location:index.php?student-exist=$random");
return "<span class='alert alert-danger float-right'>Admission number already exist</span>";
}else{
$sqlAddStudent = $conn->query ("INSERT INTO studentusers (admissionNo, surname, firstName, lastName, session, class, gender) VALUES ('$admissionNo$random', '$surname', '$firstName', '$lastName', '$session', '$class', '$gender')") or die(mysqli_error($conn));

$sqlCurrentClass = $conn->query ("INSERT INTO promotedstudent (admissionNo, session, class) VALUES ('$admissionNo$random', '$session', '$class')") or die(mysqli_error($conn));
return "<span class='alert alert-success float-right'>Student added succesfully</span>";


}
	
}else{
$sqlFindStudent = $conn->query("select * from studentusers where admissionNo='$admissionNo'");
$founded = mysqli_num_rows($sqlFindStudent);
if ($founded > 0) {
 
}else{
$sqlAddStudent = $conn->query ("INSERT INTO studentusers (admissionNo, surname, firstName, lastName, session, class, gender) VALUES ('$admissionNo', '$surname', '$firstName', '$lastName', '$session', '$class', '$gender')") or die(mysqli_error($conn));
$sqlCurrentClass = $conn->query ("INSERT INTO promotedstudent (admissionNo, session, class) VALUES ('$admissionNo', '$session', '$class')") or die(mysqli_error($conn));
return "<span class='alert alert-success float-right'>Student added succesfully</span>";

}
}


  }

    public function show($session = null, $class = null){
        global $conn;
        $data = array();
        $sqlstudentz = $conn->query("SELECT * from promotedstudent where session = '$session' and class = '$class' and deleteStatus != 1 ");
        while ($studentz = mysqli_fetch_array($sqlstudentz)) {

            $data[] = $studentz;
    }
    return $data;
}


// count number student per class

public function num_of_student($session = null, $class = null){
  global $conn;
  $sqlHowManyStudent = $conn->query("SELECT * from promotedstudent where session = '$session' and class = '$class'");
  $howManyStudent = mysqli_num_rows($sqlHowManyStudent);
  return $howManyStudent;
}

public function index(){

  global $conn;
  $sqlStudentInfo = $conn->query("select * from studentusers where admissionNo ='".$_GET['admissionNo']."'");
  $studentInfo  = mysqli_fetch_array($sqlStudentInfo);
  return $studentInfo;
}

public function student_name($admissionNo){
  global $conn;
  $sqlFindStudent = $conn->query("SELECT * from studentusers where  admissionNo='$admissionNo'");
  $name = mysqli_fetch_array($sqlFindStudent);
  return $name;
}

public function update(){

  global $conn;
  
  $admissionNo = $_POST['admissionNo'];
  $surname = $_POST['surname'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $dob = $_POST['dob'];
  $pob = $_POST['pob'];
  $gender = $_POST['gender'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $status = $_POST['status'];
  
  $sqlUpdateStudent = $conn->query(" update studentusers set admissionNo='$admissionNo', surname='$surname', firstName='$firstName', lastName='$lastName', dob='$dob', pob='$pob', gender='$gender', nationality='$country', state='$state', phone='$phone', address='$address', password ='$password', status = '$status' where admissionNo= '$admissionNo' ") or die(mysqli_error($conn));

  return "<span class='alert alert-success float-right'>Student information successfully updated</span>";
  

}

public function delete($id){
global $conn;
  $update = $conn->query("UPDATE promotedstudent SET deleteStatus = 1 WHERE id = '$id'");
  
  return "<span class='alert alert-danger float-right'>Student deleted</span>";
}

public function disable_student() {
  global $conn;
  $admissionNo = $_POST['admissionNo'];
  $session = $_POST['session'];
  $class = $_POST['class'];
  $status = $_POST['status'];
  $update = $conn->query("UPDATE promotedstudent SET status = '$status' WHERE admissionNo = '$admissionNo' and session = '$session' and class = '$class'");
  
  return "<span class='alert alert-danger float-right'>Student disbaled</span>";

}

// no of student
public function total_no_of_student(){
global $conn;
  $sqlStudentNo  = $conn->query("SELECT * from studentusers ");
  $studentNo = mysqli_num_rows($sqlStudentNo);

  return $studentNo;

}
}