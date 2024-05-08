<?php 
if(isset($_POST['submit'])){
    $to = "info@tenderstepsschool.com.ng"; // this is your Email address
    // this is the sender's Email address
    $first_name = $_POST['name'];
    
    $subject = "Assignment submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " .  " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

 
    $headers2 = "From:" . $to;
    mail($to,$subject,$message);
    mail($subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "<h2> Your answer submitted. Thank you " . $first_name . ".</h2>";
    // You can also use header('Location: contact1.php'); to redirect to another page.
    }
?>
