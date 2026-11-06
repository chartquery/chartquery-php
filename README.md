# ChartQuery PHP SDK

The official PHP SDK for the [ChartQuery](https://www.chartquery.com) chart and QR code API.

Generate chart images, diagrams, barcodes, QR codes and thermal labels on demand. PNG, SVG or PDF output.

The SDK exposes **20 methods**, one per documented endpoint (with array-shape PHPDoc for static analysis), plus a generic `request()`. It sends requests through any PSR-18 client and uses Guzzle by default.

## Requirements

- PHP 8.1 or newer

## Installation

```sh
composer require chartquery/sdk
```

## Get your API key

[Sign up for ChartQuery](https://app.chartquery.com/register) or sign in, then copy your API key from the [dashboard](https://app.chartquery.com). The client reads the `CHARTQUERY_API_KEY` environment variable when no key is passed.

## Quick start

```php
<?php

require 'vendor/autoload.php';

use ChartQuery\Client;

$client = new Client(getenv('CHARTQUERY_API_KEY') ?: null);
$response = $client->chartAi(['prompt' => 'Monthly revenue 2026 as a bar chart: Jan 10, Feb 14, Mar 18']);
print_r($response->data);
```

Parameter arrays use the names of the [API reference](https://app.chartquery.com/openapi). Unknown names throw a `SerializationException`; use `request()` for undocumented parameters.

## Binary responses

Endpoints that can return a file (image, PDF…) return a `JsonResponse` or a `BinaryResponse`:

```php
use ChartQuery\BinaryResponse;

$response = $client->qrcode(['data' => 'https://chartquery.com', 'format' => 'png']);
if ($response instanceof BinaryResponse) {
    $response->save('qrcode.png');
}
```

## Async jobs

Any call accepts `is_async: true` (useful past the 60-second server limit): the response is then a `job_id`. `waitForJob()` polls `GET /v1/jobs/{id}` until a terminal status (`CompletedJob`, `Error`, `NotFound`, `BadRequest`):

```php
$submitted = $client->chartAi(['prompt' => 'Monthly revenue 2026 as a bar chart: Jan 10, Feb 14, Mar 18', 'is_async' => true]);
$job = $client->waitForJob($submitted->data['job_id'], onProgress: static function (array $job): void {
    echo $job['status'], ' ', $job['progress'] ?? 0, "%\n";
});
print_r($job->data);
```

## GET or POST

Methods use GET when the endpoint supports it (query string). POST sends the same parameters as JSON:

```php
use ChartQuery\RequestOptions;

$client->barcode(['data' => 'test'], new RequestOptions(method: 'POST'));
```

`null` values are omitted, `false` and `0` are sent, and lists repeat the parameter name.

## Any endpoint

```php
$response = $client->request('GET', '/v1/usage');
```

## Errors

```php
use ChartQuery\Exception\ApiException;

try {
    $client->chartAi(['prompt' => 'Monthly revenue 2026 as a bar chart: Jan 10, Feb 14, Mar 18']);
} catch (ApiException $exception) {
    echo $exception->status, ': ', $exception->getMessage();
}
```

| Exception | When |
| --- | --- |
| `ConfigurationException` | Missing API key, invalid options or unsupported method. |
| `SerializationException` | A required parameter is missing, unknown or can't be sent. |
| `TransportException` | Network failure or timeout. |
| `ApiException` | Non-2xx status (`status`, `errorMessage`, `responseBody`, `rawResponse`). |
| `ResponseDecodingException` | A success response could not be decoded. |

All of them extend `ChartQuery\Exception\ChartQueryException`.

## Retries

Requests are retried up to 3 times after a network error, a `408`, `500`, `502`, `503` or `504`, or a rate limit — which the API returns as `401` (or `429`) with a `Rate limit exceeded` message. Per-key quota errors (`…: quota daily`) are not retried, nor are `400`, `402`, `404` or client-side timeouts. The delay starts at 1 second and grows 1.5× per retry (capped at 30 seconds); a `Retry-After` header wins.

```php
$client = new Client(null, ['max_retries' => 5, 'retry_delay' => 0.5]);
$client->chartAi(['prompt' => 'Monthly revenue 2026 as a bar chart: Jan 10, Feb 14, Mar 18'], new RequestOptions(maxRetries: 0)); // one request without retries
```

## Batch requests

`batch()` sends several calls with at most 10 requests in flight (`$concurrency`), through Guzzle's connection pool, and returns one `BatchResult` per call in input order. A failing call never stops the others. With a custom PSR-18 client the calls run one after another.

```php
$inputs = ['Monthly revenue 2026 as a bar chart: Jan 10, Feb 14, Mar 18', 'Market share as a pie chart: A 40, B 35, C 25'];
$calls = array_map(static fn(string $value): array => ['chartAi', ['prompt' => $value]], $inputs);

foreach ($client->batch($calls, concurrency: 5) as $result) {
    if ($result->ok()) {
        print_r($result->value->data);
    } else {
        echo $inputs[$result->index], ': ', $result->error->getMessage(), "\n";
    }
}
```

| Constant | Default | Description |
| --- | --- | --- |
| `Client::DEFAULT_CONCURRENCY` | `10` | Tasks run at the same time by batch |
| `Client::DEFAULT_TIMEOUT` | `120.0` | Request timeout (seconds) |
| `Client::MAX_RETRIES` | `3` | Retry attempts after a network error, a 408/5xx or a rate limit |
| `Client::RETRY_BACKOFF_FACTOR` | `1.5` | Exponential backoff multiplier |
| `Client::DEFAULT_RETRY_DELAY` | `1.0` | Delay before the first retry (seconds) |

## Options and custom HTTP clients

```php
$client = new Client(null, [
    'timeout' => 60.0,               // seconds, default 120 (default Guzzle client only)
    'headers' => ['X-Trace' => 'abc'],
    'http_client' => $psr18Client,   // optional: any PSR-18 client
]);
```

## Endpoints

20 methods, generated from the [OpenAPI document](https://app.chartquery.com/openapi).

| Method | HTTP | Description |
| --- | --- | --- |
| `barcode()` | GET / POST `/v1/barcode` | Generate a barcode image via GET. Output: SVG (default) or PNG. Supports 25+ formats: EAN-13, Code 128, ITF-14, GS1-128, postal codes and m… |
| `chart()` | GET / POST `/v1/chart` | Render a Chart.js image via GET. Pass the full chart object as URL-encoded JSON in query. Prefer format png for ChatGPT. POST sends the sam… |
| `chartAi()` | GET / POST `/v1/chart/ai` | Describe a chart in plain English via GET and get a rendered image back. Powered by AI. |
| `chartRender()` | GET `/v1/chart/render/{id}` | Render a previously saved chart by ID. Public, no API key required. Supports URL overrides for templates (?data1=, ?labels=, ?title=…). |
| `chartView()` | GET `/v1/chart/view/{id}` | View a previously saved chart as an interactive HTML page. Public, no API key required. Iframe-embeddable. |
| `diagram()` | GET / POST `/v1/diagram` | Render a diagram via GET. Use type (mermaid, d2, …), query (source code), and format=png for ChatGPT. POST uses diagram_type and diagram_so… |
| `diagramAi()` | GET / POST `/v1/diagram/ai` | Describe a diagram in plain English via GET and get a rendered image back. Powered by AI. |
| `diagramRender()` | GET `/v1/diagram/render/{id}` | Render a previously saved diagram by ID. Public, no API key required. Supports ?format= and ?query= overrides. |
| `diagramView()` | GET `/v1/diagram/view/{id}` | View a previously saved diagram as an HTML page. Public, no API key required. Iframe-embeddable with inline SVG rendering. |
| `jobs()` | GET `/v1/jobs/{id}` | Poll the status, progress (0–100) and result of a job started with is_async=true. Polling is free. Poll until status is terminal: Completed… |
| `label()` | GET / POST `/v1/label` | Preview a thermal label via GET. Pass the same label object as a URL-encoded JSON string in query. Inside that JSON, text items use content… |
| `labelCompile()` | POST `/v1/label/compile` | Compile a label to printer commands (tsc, zpl, epl, …). POST width, language, and elements. Text uses content and size (1-10), not text or… |
| `labelConvert()` | POST `/v1/label/convert` | Convert printer commands from one language to another. POST source, from, and to. from is the source language (tsc, zpl, epl, …). to is the… |
| `labelParse()` | POST `/v1/label/parse` | Parse printer commands into structured elements. POST source and language (tsc, zpl, epl, …). |
| `labelRender()` | GET `/v1/label/render/{id}` | Render a previously saved label by ID. Public, no API key required. Supports ?format= override. |
| `labelValidate()` | POST `/v1/label/validate` | Validate printer commands. POST source (the raw commands) and language (tsc, zpl, epl, …). |
| `labelView()` | GET `/v1/label/view/{id}` | View a previously saved label as an HTML page. Public, no API key required. Iframe-embeddable with inline SVG rendering. |
| `qrcode()` | GET / POST `/v1/qrcode` | Generate a styled QR code via GET. Output: SVG (default) or PNG. Supports dot styles, gradients, custom corners and all QR versions. |
| `stats()` | GET `/v1/stats` | Infrastructure health for an engine or endpoint over the last hour. Not scoped to your account or tenant. Enabled per account: HTTP 403 mea… |
| `usage()` | GET `/v1/usage` | Return this account's Chartquery usage and credit balance. No body. Requires an API key. |

## All ChartQuery SDKs

| SDK | Package | Install |
| --- | --- | --- |
| Node.js | [`@chartquery/sdk`](https://www.npmjs.com/package/@chartquery/sdk) | `npm install @chartquery/sdk` |
| Python | [`chartquery`](https://pypi.org/project/chartquery/) | `pip install chartquery` |
| Go | [`chartquery-go`](https://pkg.go.dev/github.com/chartquery/chartquery-go) | `go get github.com/chartquery/chartquery-go` |
| .NET | [`ChartQuery`](https://www.nuget.org/packages/ChartQuery) | `dotnet add package ChartQuery` |
| Ruby | [`chartquery`](https://rubygems.org/gems/chartquery) | `gem install chartquery` |
| PHP | [`chartquery/sdk`](https://packagist.org/packages/chartquery/sdk) | `composer require chartquery/sdk` |
| Java | [`chartquery-java`](https://github.com/chartquery/chartquery-java) | build from source, see its README |
| CLI | [`@chartquery/cli`](https://www.npmjs.com/package/@chartquery/cli) | `npm install -g @chartquery/cli` |
| MCP server | [`@chartquery/mcp`](https://www.npmjs.com/package/@chartquery/mcp) | `npx -y @chartquery/mcp` |

## License

MIT — see [LICENSE](LICENSE).
