<?php
namespace App\Services;
use Illuminate\Http\Client\Request ;
use Illuminate\Support\Facades\Http;

class NotificationService 
{


  public function sendNotificationForAll($notification) {
    $token ='key=AAAAUUIfcaY:APA91bEuS64G2AWymL88nRqfo';
  
    $headers = [
      'Authorization' => $token ,
      'Accept' => 'application/json',
      'Content-Type' => 'application/json'
    ];
    
    $body = [
      "to"=> "/topics/all",
      "notification"=>[
        "title"=> $notification->title,
        "body"=> $notification->body,
        "photo"=> $notification->photo,
        // "subtitle"=> "Firebase Cloud Message Subtitle"
      ] ,
      "payload"=>[
        "order_id"=> $notification->id,
      ]
    ];
    $url="https://fcm.googleapis.com/fcm/send";
    return Http::withHeaders($headers)->post($url, $body);
  
  }

  public function send2($device_token,$id=0,$userName='Someone',$type='',$token_type='',$data='') {
   if($type=='notification'){
    $title=$data->title??'';
    $body=  $data->body??'';
  }
 elseif($type=='new_order'){
    $title="New Order";
    $body=  $userName." wants to order = ".$id;
  }

  elseif($type=='order_finish') {
    $title="Order completed";
    $body=  " This order has been completed ".$id;
  }

  else return null ;

  return NotificationService::sendNotification($device_token,$title,$body,$id,$token_type);
  

}
public function sendNotification($device_token,$title,$body,$id=0,$token_type) {

  $token=[
    // 'pharm'=>'key=AAAALGiPoo0:APA91bFEpp_dDVF5Z3YsE2crXRdwscz9TNh7YVWHERJ5bCFEFXthW3B925QVzXTXNsoGm1fWTGp96gBdnT2WRth9_c1nYcdt_vP5vJp2R-H4zqDaXT_U-sxBG4-Ulfkit0-g6R1XW6rc',  
    'delivery'=>'key=AAAADQ0dYOE:APA91bHodDrZEej2_GDMBmVyEvHNUKQYI2XFdxnWvqJD4vFEEDzqiyKa7_ZKOwCi8qqH2baNM0bD1_gylFcZkWJAX2n7t7bKrV89bppfsqDyYG7v2u5KHQi8uTXxtCPzKTKBejxvuRBp',
    'user'=>'key=AAAAUUIfcaY:APA91bEuS64G2AWymL88nRqfobOz9qNhMxvarWBQ4OsZfJ3MFA6cn_WqMO95FMnzKjS-wienZldcCtm9ZRMrdNFUloTc645YPdA5scMP0-B6rh1apaAkzQgT1LyS3EMbBJ9NxgIF4qw2',
    'client'=>'key=AAAAUUIfcaY:APA91bEuS64G2AWymL88nRqfobOz9qNhMxvarWBQ4OsZfJ3MFA6cn_WqMO95FMnzKjS-wienZldcCtm9ZRMrdNFUloTc645YPdA5scMP0-B6rh1apaAkzQgT1LyS3EMbBJ9NxgIF4qw2'
  ];

  $headers = [
    'Authorization' => $token[$token_type] ,
    'Accept' => 'application/json',
    'Content-Type' => 'application/json'
  ];
  
  $body = [
    "to"=> $device_token,
    "notification"=>[
      "body"=> $body,
      "title"=> $title,
      "subtitle"=> "Firebase Cloud Message Subtitle"
    ] ,
    "payload"=>[
      "order_id"=> $id,
    ]
  ];
  $url="https://fcm.googleapis.com/fcm/send";
  return Http::withHeaders($headers)->post($url, $body);

}
public function send3($token)
{
    $request = new HTTP_Request2();
    $request->setUrl('https://fcm.googleapis.com/fcm/send');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'Authorization' => 'key=AAAAy-xnneQ:APA91bEbIxxfGmNMrX-UvWZViMHgNuF9GTmLXaVP_uLAH1bXJ3o1I248wGzP1ZNHXjBegVCEqUsc4olP88xLOqBXuVbLK1LtGlX0L4Pg75gSyOfBYzR-eAokhPZtfQga9Xu_47irZcSE',
      'Content-Type' => 'application/json'
    ));
    $request->setBody('{\n	"to": "e6Rk53bGRWSZi39PWY79XF:APA91bGDWnGPxuRYbYPB66Gi4lW0vy79SUu9Aca8RPHZzvxQexNcpHlaJgaNXdCZvD74j1TKMTmOZXBSVP-RZtTXdLie3cPphYRP0UzsCcPUp_TqUDaj2hcnNm-HepyQT7wLZdv69HgY",\n	"notification": {\n		"body": "Sayeeeeeeeeeeeeeeeeed",\n		"title": "Sayeeeeeeeeeeeeeeeeed 2",\n		"subtitle": "Sayeeeeeeeeeeeeeeeeed 3    "\n	}\n}');
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        echo $response->getBody();
      }
      else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
}
 
    public function send($token)
    {
 
        $message = array(
            "title" => "ayad  Message",
            "body" => "This is Test message body"
        );
        
        $SERVER_API_KEY = 'AAAAy-xnneQ:APA91bEbIxxfGmNMrX-UvWZViMHgNuF9GTmLXaVP_uLAH1bXJ3o1I248wGzP1ZNHXjBegVCEqUsc4olP88xLOqBXuVbLK1LtGlX0L4Pg75gSyOfBYzR-eAokhPZtfQga9Xu_47irZcSE';
        $data = [
            "to" => $token,
            "data" => $message
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        curl_close($ch);
        // dd($response);
        return $response;
    }
 



}

?>
