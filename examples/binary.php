<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use ChartQuery\Client;

$client = new Client(); // reads CHARTQUERY_API_KEY
$response = $client->qrcode(['data' => 'https://chartquery.com', 'format' => 'png']);
if ($response instanceof ChartQuery\BinaryResponse) {
    $response->save('qrcode.png');
    echo 'Saved qrcode.png (', $response->contentType, ', ', \strlen($response->bytes), " bytes)\n";
} else {
    print_r($response->data);
}
