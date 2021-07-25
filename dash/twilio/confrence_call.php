<?php
	// The PHP Twilio helper library. Get it here http://www.twilio.com/docs/libraries/
	require_once('twilio.php');

	$API_VERSION = '2010-04-01';
	$ACCOUNT_SID = 'ACXXXXXXXXXXXXXXXXXXXX';
	$AUTH_TOKEN = 'XXXXXXXXXXXXXXXXXXXXXXX';

	$client = new TwilioRestClient($ACCOUNT_SID, $AUTH_TOKEN);

	// The phone numbers of the people to be called
	$participants =  array('+123456789322', '+123456789323');

	// Go through the participants array and call each person.
	foreach ($participants as $particpant)
	{
//            echo $particpant."<br>";
		$vars = array(
			'From' => '+2433254556623',
			'To' => $particpant,
			'Url' => 'http://site_url/conference.xml');

		$response = $client->request("/$API_VERSION/Accounts/$ACCOUNT_SID/Calls", "POST", $vars);
	}
//echo "<pre>";
//print_r($response);
//echo "</pre>";
        ?>