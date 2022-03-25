<?php

require_once __DIR__.'/vendor/autoload.php';

$client = new GuzzleHttp\Client();

try {
    $response = $client->get('https://quotes.rest/qod?language=en');
    $contents = $response->getBody()->getContents();

    $contents = json_decode($contents, true);

    $quote = $contents['contents']['quotes'][0]['quote'];

    $quote = '**' . $quote . '**' . "\n\n";


    $author = $contents['contents']['quotes'][0]['author'];
    $author = '*"' . $author . '"*';

    file_put_contents("README.md",$quote . $author);

} catch (Exception $e) {
    echo $e->getMessage();
}


