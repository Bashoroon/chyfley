<?php
session_start();

include __DIR__ . '/db.php';
// Authenticate user


if (!isset($_SESSION['username'])) {
    echo '<script type="text/javascript">
          window.location = "login.php?sess"
      </script>';
      die('Sorry, you are not allowed');
}
if (isset($_GET['logout'])) {
    session_destroy();
}

include __DIR__ . '/src/Controllers/Authentication.php'; // Ensure this path is correct
require __DIR__ . '/src/Controllers/Subject.php'; // Ensure this path is correct
include __DIR__ . '/src/Controllers/Student.php'; // Ensure this path is correct
include __DIR__ . '/src/Controllers/Session.php'; // Ensure this path is correct
include __DIR__ . '/src/Controllers/Class.php'; // Ensure this path is correct
include __DIR__ . '/src/Controllers/Record.php'; // Ensure this path is correct
include __DIR__ . '/src/Controllers/Staff.php'; // Ensure this path is correct
include __DIR__ . '/src/Controllers/Attendance.php'; // Ensure this path is correct

use Controllers\Authentication\Authentication;
use Controllers\Subject\Subject;
use Controllers\Student\Student;
use Controllers\Session\Session;
use Controllers\Clazz\Clazz;
use Controllers\Record\Record;
use Controllers\Staff\Staff;
use Controllers\Attendance\Attendance;



// response from php function
$response = "";


// Create an instance of classes
$AuthController = new Authentication();
$classController = new Clazz();
$sessionController = new Session();
$subjectController = new Subject();
$studentController = new Student();
$recordController = new Record();
$staffController = new Staff();
$attendanceController = new Attendance();



$username = $_SESSION['username'];
$nameFound = $AuthController->who_logged_in($username);
$role = $nameFound['role']; // print teacher role
$subjectTeacher = explode(',', $nameFound['subject']); // explode teacher subejects
$classTeacher = explode(',', $nameFound['class']); // explode teacher class

// Add Class 
if (isset($_POST['add-class'])) { 
    $response = $classController->create();
}
$classes = $classController->show(); // show all classes funtion
if (isset($_GET['admissionNo'])) {
$admissionNo = $_GET['admissionNo'];
$myClasses = $classController->my_class($admissionNo); // show all my classes for a particular student
$mySessions = $sessionController->my_session($admissionNo); //show all my classes for a particular student
}

$teacherClasses = $classController->teacher_class($username); // show teacher classes
$sessions = $sessionController->show(); // show all sessions
// Call the `show` method to get all subjects
$teacherSubjects = $subjectController->subject_teacher($username);
$subjects = $subjectController->show();

// add subject
if (isset($_POST['add-session'])) { // check is if delete button is set ot triggered
     // get id to delete subject
    $response = $sessionController-> create(); // Add Session
}

// Check if the delete buttion is set or triggered
if (isset($_POST['delete-subject'])) { // check is if delete button is set ot triggered
    $id = $_POST['id']; // get id to delete subject
    $response = $subjectController->delete($id); // Delete
    

}

// Check if the form is submitted
if(isset($_POST['update-subject'])){ // check if the update button is set or triggered
    $subject = $_POST['subject']; // get the subject to update
    $id = $_POST['id']; // get the id to update
   
    $response = $subjectController->update($id, $subject); // Update the subject
    
   
}
// add subject 
if(isset($_POST['add-subject'])){ // check if the form is triggered
    $response = $subjectController->create(); // function to submit
    
   }

   // load student by class
   if(isset($_GET['load-student'])){ // check if the form is triggered
    $session = $_GET['session']; 
    $class = $_GET['class'];
    
     $students = $studentController->show($session, $class); // function to submit
     $noOfStudent = $studentController->num_of_student($session, $class);
    
   }else{



   }
   // add student
   if (isset($_POST['add-student'])) {
    $response = $studentController->create();
    
   }

   // add staff
   if (isset($_POST['add-teacher'])) {
    $response = $staffController->create();
    
   }

   //delete staff
   if (isset($_POST['delete-staff'])) {
    $id = $_POST['id'];
    $response = $staffController->delete($id);
   }

   // show staff
   $staffs = $staffController->show();
   // update student profile
   if (isset($_POST['update-student'])) {
    $response = $studentController->update();
   }

   //disble student 
   if (isset($_POST['disable'])) {
    $response = $studentController->disable_student();
    
   }

   // Display student profile
   
   //delete student
   if (isset($_POST['delete-student'])) {
    $id = $_POST['id'];
    
    $response = $studentController->delete($id);
   }
   

   //Add Record
   if(isset($_POST['add-score'])){
   $response = $recordController->create();
   }

   //update  Score
   if(isset($_POST['update-score'])){
    $response = $recordController->update();
    }
   // show record
   if(isset($_GET['record'])){
    $session = $_GET['session'];
    $term = $_GET['term'];
    $class = $_GET['class'];
    $subject = $_GET['subject'];
       $records = $recordController->show($session, $term, $class, $subject);
   }

   if(isset($_GET['broadsheet'])){
    $session = $_GET['session'];
    $term = $_GET['term'];
    $class = $_GET['class'];

       $broadsheets = $recordController->broadsheet($session, $term, $class);
   }

   // delete a student score

   if(isset($_POST['delete-score'])){
    $response = $recordController->delete();
   }

   // submit attendance and student comment
   if(isset($_POST['submit-student-comment'])){
    $response = $attendanceController->add_student_comment_and_attendance();
   }

   // add comment
   if(isset($_POST['add-comment'])){
    $response = $attendanceController->add_comment();
   }