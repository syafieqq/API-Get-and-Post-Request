<?php
$data="{\"name\":\"Danial\",\"year\":\"6\",\"university\":\"Uitm\"}";
$url= 'http://localhost/intern/test/api.php/students';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo json_encode($response);
}

?>
