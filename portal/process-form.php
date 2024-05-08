<?php 
$servername = "localhost";
$username = "bashoroon";
$password = "foyetola";
$db = "tender_db";
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$name = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$depart = $_POST['depart'];
$feed = $_POST['feed'];



$add="INSERT INTO users(name,username, email, role, password) VALUES('$lname', '$name', '$email', '$depart', '$feed')";
$sql = $conn->query($add) or die(mysqli_error($this->con));
if ($sql==true) {
    echo " added successfully";

    $to      = $email;
    $subject = 'Contact Form';
    $message = $feed;
    $headers = 'From: lawalsherifoyetola@gmail.com'       . "\r\n" .
                 'Reply-To: lawalsherifoyetola@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    
}else{
    echo " Failed... Try again!";
}
?>