<?php
$amount = $_GET['amount'];
$currency = $_GET['currency'];
$type = $_GET['type'];


function request() {
$url = "https://test.oppwa.com/v1/checkouts";
$data = "authentication.userId=8a8294185dbc881e015deeee63307a5c" .
  "&authentication.password=dQEQgN2Atp" .
  "&authentication.entityId=8a8294185dbc881e015deeefcaa77a63" .
  "&amount=" . $amount .
  "&currency=" . $currency .
  "&paymentType=" . $type .
  "&shopperResultUrl=devsupport://callback" .
  "&notificationUrl=https://frozen-reef-67391.herokuapp.com/instamojo_server.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$responseData = curl_exec($ch);
if(curl_errno($ch)) {
return curl_error($ch);
}
curl_close($ch);
return $responseData;
}

$responseData = request();

echo $responseData;

?>
