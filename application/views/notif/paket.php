<?php
$arr = array();
foreach($dataToken as $data){
    $dataTokenUser  = $data->USERTOKEN;
    $arr[]          = $dataTokenUser;

    $curl           = curl_init();

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
      "registration_ids":["'.$dataTokenUser.'"],
      "notification": {
        "title": "Paket Baru",
        "body": "'.$namaPaket.'"
      },
      "priority":"high"
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-type: application/json',
        'Authorization: key=AAAAl2HBAKg:APA91bGvh5uD1QU5QflaQ9Ng5AiiSkfAVni-00gDk6hzlcu8qca1XnF2PfDu7tk2TOmzoLiW0EnWuiEFt4hY7bVRju-7zU3AfQ6F6LQ64nm59CDWCJMzcodRnSypy4pgZMbg5sDvcAcz'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}

?>
