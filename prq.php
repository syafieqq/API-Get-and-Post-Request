<?php
$name=$_POST['name']; //from index.php
$year=$_POST['year']; //from index.php
$university=$_POST['university']; //from index.php

$data="{\"name\":\"$name\",\"year\":\"$year\",\"university\":\"$university\"}";
$url= 'https://warm-bastion-18306.herokuapp.com/api.php/students/';
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
header('Location: api.php/students');
?>
