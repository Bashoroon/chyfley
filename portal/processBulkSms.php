
<?php 
$api = $_GET['api_token'];
$from = $_GET['from'];
$to = $_GET['to'];
$body = $_GET['body'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https:///www.bulksmsnigeria.com/api/v1/sms/create",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{\"body\": \"$body\", \"to\" : [ \"$to\" \"from\": \"$from\"}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer ZZrXLnz7G81MGIKRxYO2s47SwC3rroSJAR9Wuk6J1GRUnkB5c9FBlROqaSpn",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
