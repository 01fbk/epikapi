<?php

ob_start();

$url = "https://usersapiv2.epik.com/v2/users?SIGNATURE=xxxx-xxxx-xxxx-xxxx";

$data = array(
    "USER" => array (
        "username" => "01fbk",
        "firstName" => "Test",
        "lastName" => "Test",
        "email" =>  "email@email.org",
        "organization" =>  "Test Org.",
        "address1" => "test str. #1",
        "address2" => "ON",
        "city" => "New York", 
        "state" => "NY",
        "zip" => "10001",
        "country" => "US",
        "phone" => "+1.2120001111",
    )
);

$postdata = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);

print_r ($result);

ob_end_flush();

?>
