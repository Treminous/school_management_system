<?php

$Consumer_Key="UeAMWNlPv1qZZIthmnzWNIA6AndEJsVG";
$Consumer_Secret="h6pSVz6utjpcxBAl";

$key=base64_encode($Consumer_Key .":" .$Consumer_Secret);
//Make request
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic ".$key,
        "Cache-Control: no-cache",
        "Content-Type: application/json"
    ),
));

$response = curl_exec($curl);

$err = curl_error($curl);
curl_close($curl);
//access token

$data=json_decode($response);

$access_token=$data->access_token;



// stk push request

$post_data=json_encode(array(
    
	"BusinessShortCode"=> "174379",
	"Password"=> "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjMwNDEzMTcyNjAx",
	"Timestamp"=> "20230413172601",
	"TransactionType"=> "CustomerPayBillOnline",
	"Amount"=> "1000",
	"PartyA"=> "254708374149",
	"PartyB"=> "174379",
	"PhoneNumber"=> "254718866683",
	"CallBackURL"=> "https://peternjeru.co.ke/safdaraja/api/callback.php",
	"AccountReference"=> "account",
	"TransactionDesc"=>"test" 




));


$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS =>$post_data,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".$access_token,
                "Cache-Control: no-cache",
                "Content-Type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        print_r($response);




?>