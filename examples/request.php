<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use ChartQuery\Client;

$client = new Client(); // reads CHARTQUERY_API_KEY
try {
    $response = $client->request('GET', '/v1/usage');
    if ($response instanceof ChartQuery\JsonResponse) {
        print_r($response->data);
    }
} catch (ChartQuery\Exception\ApiException $exception) {
    fwrite(STDERR, sprintf("HTTP %d: %s\n", $exception->status, $exception->getMessage()));
}
