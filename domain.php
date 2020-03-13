<?php

ob_start();

$domain_to_register = 'mydomain.com';
$url = "https://usersapiv2.epik.com/v2/domains/".$domain_to_register."/create?SIGNATURE=xxxx-xxxx-xxxx-xxxx";

$data = array(
	"PERIOD" => "1", //period in years
	"ASSIGNUSERID" => "xxxxxx", //user id from the add-users php file
    "CONTACTS" => array (
        "name" => "Test",
        "companyname" => "TestingCompany",
        "email" => "cristian-reseller-603613@epikdomains.com", // email for the user created - i have the real email that was created when i tested the script, for you to see what email the user will have
        "address1" => "test str. #1",
        "city" => "New York", 
        "state" => "NY",
        "zipcode" => "10001",
        "country" => "US",
        "phonenumber" => "+1.2120001111"
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
