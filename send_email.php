<?php
 $post_data=json_encode(array(
    
	    "From"=> "geofrey.ongidi@digitalvision.co.ke",
        "To"=> "bakhuyamilka@gmail.com",
        "Subject"=> "Hello from Postmark",
        "HtmlBody"=> "<strong>Hello</strong> dear Postmark user.",
        "MessageStream"=> "notifications"




));


$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.postmarkapp.com/email",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS =>$post_data,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json" ,
                "Content-Type: application/json" ,
                "X-Postmark-Server-Token: b1371069-335f-431b-8f45-88c22d7f1c47",
                "Cache-Control: no-cache",
                "Content-Type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        print_r($response);




?>