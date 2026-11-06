<?php

declare(strict_types=1);

namespace ChartQuery\Exception;

use ChartQuery\RawResponse;

/**
 * A successful response could not be decoded as the documented representation.
 */
final class ResponseDecodingException extends ChartQueryException
{
    public function __construct(string $message, public readonly RawResponse $rawResponse)
    {
        parent::__construct($message);
    }
}
