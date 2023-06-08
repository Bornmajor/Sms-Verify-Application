<?php

/**
 * Send an SMS message directly by calling HTTP endpoint.
 *
 * For your convenience, environment variables are already pre-populated with your account data
 * like authentication, base URL and phone number.
 *
 * Please find detailed information in the readme file.
 */

require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

$client = new Client([
    'base_uri' => "https://r5rqv1.api.infobip.com/",
    'headers' => [
        'Authorization' => "App 03fbf2d12c8c22d7365598ba9ef74c13-29f4171a-b780-4f55-8fe1-e129c534b905",
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ]
]);

$response = $client->request(
    'POST',
    'sms/2/text/advanced',
    [
        RequestOptions::JSON => [
            'messages' => [
                [
                    'from' => 'InfoSMS',
                    'destinations' => [
                        ['to' => "254726710303"]
                    ],
                    'text' => 'This is a sample message',
                ]
            ]
        ],
    ]
);

echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);
