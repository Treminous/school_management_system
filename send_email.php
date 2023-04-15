<?php
$consumer="R4kG3dCj24MldKCEbVXFhPGyyS5J7H9k";
$secret="9aACXusepQlNE7bM";
$key=base64_encode($consumer. ":" .$secret);

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
                "Authorization: Basic" .$key,
                "Cache-Control: no-cache",     

                "Content-Type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        print_r($response);

                   
?>

