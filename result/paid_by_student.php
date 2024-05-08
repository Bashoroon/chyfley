<?php
$servername = "localhost";
$username = "tenderst_kewe";
$password = "kewe_123456789";
$database = "tenderst_db";
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$session= $_GET['session'];
$class= $_GET['class']; 
$term = $_GET['term']; 
$admissionNo = $_GET['admissionNo']; 
$cashbank = $_GET['cashbank'];
$type = "Paystack"; 
$ref = uniqid(); 
foreach ($_GET['particular'] as $key => $value) {
	
		$particular = $_GET['particular'][$key];
		$id = $_GET['id'][$key];
		$amount = $_GET['amount'][$key];
if ($amount !== "0") {
	$sqlPrepareBill=  $conn->query("insert into income (session, class, term, admissionNo, particular, amountPaid,  receiptID, status, cashbank) values ('$session', '$class', '$term', '$admissionNo', '$particular', '$amount', '$ref', '0', 'paystack' )") or die(mysqli_error($conn));
$sqlUpdate = $conn->query("update studentbill set ref = '$ref' where id='$id' ");
// 	$sqlSelect = $conn->query("select * from studentbill where id ='$id' ");
// 	$selected = mysqli_fetch_array($sqlSelect);
// 	$realamount = $selected['amount'];
// 	$deducted = $realamount - $amount;

// 	$updateStudentBill = $conn->query("update studentbill set ref='$ref' where id='$id' ");

}

	}
	
header("location: studentAboutToPay.php?session=$session&term=$term&class=$class&ref=$ref");
 
?>