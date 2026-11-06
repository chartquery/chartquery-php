<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use ChartQuery\Client;

$client = new Client(); // reads CHARTQUERY_API_KEY
$response = $client->chartAi(['prompt' => 'Monthly revenue 2026 as a bar chart: Jan 10, Feb 14, Mar 18']);
echo json_encode($response->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), "\n";
