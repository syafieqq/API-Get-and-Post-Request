<?php

$name = $_POST['name'];
$year = $_POST['year'];
$university = $_POST['university'];


$data=array(
		'name' =>$name,
		'year' => $year,
		'university' => $university
		
);
$url = 'http://localhost/intern/api/students';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);

header('Location: http://localhost/intern/api/students ');
?>