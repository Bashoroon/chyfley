 <?php

// $curl = curl_init();
// $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
// if(!$reference){
//   die('No reference supplied');
// }

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_HTTPHEADER => [
//     "accept: application/json",
//     "authorization: pk_test_632ac2eaa3db5bb6a2f6683e2af1914f35edf816",
//     "cache-control: no-cache"
//   ],
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// if($err){
//     // there was an error contacting the Paystack API
//   die('Curl returned error: ' . $err);
// }

// $tranx = json_decode($response);

// if(!$tranx->status){
//   // there was an error from the API
//   die('API returned error: ' . $tranx->message);
// }

// if('success' == $tranx->data->status){
//   // transaction was successful...
//   // please check other things like whether you already gave value for this ref
//   // if the email matches the customer who owns the product etc
//   // Give value
//   echo "<h2>Thank you for making a purchase. Your file has bee sent your email.</h2>";
// }

// ?>
<script>
curl https://api.paystack.co/transaction/verify/:reference
-H "Authorization: Bearer pk_live_ab22ece433699874fb0555579ea1b13bc36549f5"
-X GET
</script>
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
$ref = $_GET['reference'];
$sqlUpdate = $conn->query("update income set status = '1' where receiptID='".$_GET['reference']."' ");
$sqlSelectStudentBill = $conn->query("select * from studentbill where ref ='$ref' ");
	while($selectedStudentBill = mysqli_fetch_array($sqlSelectStudentBill)){
	    
	    
	    $sqlSelectIncome = $conn->query("select * from income where receiptID ='".$selectedStudentBill['ref']."' and particular='".$selectedStudentBill['particular']."' ");
	    $selectedIncome = mysqli_fetch_array($sqlSelectIncome);
        


	$deducted = $selectedStudentBill['amount'] -  $selectedIncome['amountPaid'];
    
    
	$updateStudentBill = $conn->query("update studentbill set amount='$deducted' where ref ='".$_GET['reference']."' and particular='".$selectedStudentBill['particular']."' ");
//   print $selectedStudentBill['amount'];


   
	}
	header('location:index.php?fee=s');

	
// $sqlAddStudent = $conn->query ("INSERT INTO incomeandexpenditure (session, term, class, admissionNo, particular, type, amount, reference) VALUES ('".$_GET['session']."', '".$_GET['term']."', '".$_GET['class']."', '".$_GET['admissionNo']."', 'School Fees', 'School Fees', '".$_GET['amount']."', '".$_GET['reference']."')") or die('unable to add School Fees');
// die("".$_GET['reference']."");
// $sqlAddStudent = $conn->query ("INSERT INTO incomeandexpenditure (session, term, class, admissionNo, particular, type, amount, reference) VALUES ('".$_GET['session']."', '".$_GET['term']."', '".$_GET['class']."', '".$_GET['admissionNo']."', 'School Fees', 'School Fees', '".$_GET['amount']."', '".$_GET['reference']."')") or die('unable to add School Fees');
// die("".$_GET['reference']."");
?>