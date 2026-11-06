<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use ChartQuery\Client;

$client = new Client(); // reads CHARTQUERY_API_KEY
$submitted = $client->chartAi(['prompt' => 'Monthly revenue 2026 as a bar chart: Jan 10, Feb 14, Mar 18', 'is_async' => true]);
$jobId = \is_array($submitted->data) ? (string) ($submitted->data['job_id'] ?? '') : '';
$job = $client->waitForJob($jobId, onProgress: static function (mixed $job): void {
    if (\is_array($job)) {
        echo $job['status'] ?? '?', ' ', $job['progress'] ?? 0, "%\n";
    }
});
print_r($job->data);
