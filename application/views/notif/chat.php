<?php

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "registration_ids":["'.$token.'"],
  "notification": {
    "title": "Admin",
    "body": "'.$message.'"
  },
  "priority":"high"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-type: application/json',
    'Authorization: key=AAAA0wUL9DU:APA91bFML8PvJGXVP_Xez2JAB0ag6hzYdkGsVR0Do36JOG-uGWwbA-tpqEY4V5dG9NvSSTO4Y98rmmM21ZJbSHMLG5NL0Lajm3ggJjOVXU_w6Z-PNRxdKHTlhwp9PRaDqmPrq70YDpqt'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
