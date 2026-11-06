<?php

declare(strict_types=1);

namespace ChartQuery\Exception;

use ChartQuery\RawResponse;

/**
 * ChartQuery returned a non-success HTTP status.
 */
final class ApiException extends ChartQueryException
{
    public readonly int $status;

    public function __construct(
        public readonly RawResponse $rawResponse,
        public readonly mixed $responseBody = null,
        public readonly ?string $errorMessage = null,
    ) {
        $this->status = $rawResponse->status;
        parent::__construct($errorMessage ?? sprintf('ChartQuery API request failed with status %d.', $rawResponse->status), $rawResponse->status);
    }
}
