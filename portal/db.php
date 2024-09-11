<?php

$servername = "localhost";
$username = "bashoroon"; // Replace with your actual MySQL username
$password = "foyetola"; // Replace with your actual MySQL password
$db = "tenderst_db";
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

