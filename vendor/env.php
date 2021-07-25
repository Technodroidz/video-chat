<?php

$variables = [
    'TWILIO_ACCOUNT_SID' => 'AC26bf646a7f25d45e803eaf1beb98b4ab',
    'TWILIO_ACCOUNT_TOKEN' => '2ff81282381165617b207684e8eacb00',
    'TWILIO_PHONE_NUMBER' => '+19386666095',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}