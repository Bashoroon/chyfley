<?php
include 'db.php';
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$class = $_POST['class'];
$subject = $_POST['subject'];
$classString = implode(',', $class);
$subjectString = implode(',', $subject);

$sqlAddTeacher = $conn->query("INSERT INTO users (name, username, email, password, role, class, subject, status) VALUES ('$name', '$username', '$email', '$password', '$role', '$classString', '$subjectString', '1')") or die('Unable to add teacher');
echo "Teacher added successfully";

?>