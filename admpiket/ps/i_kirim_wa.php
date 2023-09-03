<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.fonnte.com/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
'target' => '0'.$nowanya.'',
'message' => ''.$pesannya.'. 


Dikirim oleh : 
Agus Muhajir. 
'.$versi.'
http://github.com/hajirodeon', 
'countryCode' => '62', //optional
),
  CURLOPT_HTTPHEADER => array(
    'Authorization: '.$tokennya.'' //change TOKEN to your actual token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
?>