<?php
require_once"../../vendor/autoload.php";
use Twilio\Rest\Client;
use Twilio\TwiML\VoiceResponse; 

$AccountSid = env('TWILIO_ACCOUNT_SID');
$AccountToken = env('TWILIO_ACCOUNT_TOKEN');
$TwilloNumber = env('TWILIO_PHONE_NUMBER');
//  echo $AccountSid;
// die;

// $response = new VoiceResponse();
// $dial = $response->dial('');
// $dial->number('19386666095', ['sendDigits' => 'wwww1928']);

// echo $dial;

$client = new Client($AccountSid, $AccountToken);

try{
    $call = $client->calls->create(
        "+919582368734", $TwilloNumber,
        ["url" => "https://videochat-app.younggeeks.net/video-chat/dash/twilloCallback.xml"]

    );
        echo "Started call: ". $call->sid;
} catch (Exception $e){
    echo "Error: " .$e->getMessage();
}

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure



// $sid = getenv("TWILIO_ACCOUNT_SID");
// $token = getenv("TWILIO_AUTH_TOKEN");
// $twilio = new Client($AccountSid, $AccountToken);

// $room = $twilio->video->v1->rooms
//                           ->create(["uniqueName" => "vjDailyStandup"]);

// // print($room->sid);


?>
   