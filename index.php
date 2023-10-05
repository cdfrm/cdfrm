<?php

require_once __DIR__.'/vendor/autoload.php';

$client = new GuzzleHttp\Client();

try {
    $response = $client->get(
        'https://quotes.rest/qod?language=en',
        [
    'headers' => [
        'Authorization' => 'Bearer nrhaonSiHvsdOcL0ugFJP6zaCbvs4Uef8p73TQEY',
        'Accept' => 'application/json',
    ]
]);
    $contents = $response->getBody()->getContents();

    $contents = json_decode($contents, true);

    $quote = $contents['contents']['quotes'][0]['quote'];

    $quote = '**' . $quote . '**' . "\n\n";


    $author = $contents['contents']['quotes'][0]['author'];
    $author = '*"' . $author . '"*' . "\n\n";
    
    $badge = "![](https://api.nosense.lol/ghvc/?username=cdfrm)";

    file_put_contents("README.md",$quote . $author . $badge);

} catch (Exception $e) {
    echo $e->getMessage();
}


