<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle;

use Chanshige\HalJsonResponseBundle\Contracts\HalJsonResponseInterface;
use Koriym\HttpConstants\MediaType;
use Koriym\HttpConstants\RequestHeader;
use Koriym\HttpConstants\StatusCode;

final class HalJsonResponse implements HalJsonResponseInterface
{
    private int $code = StatusCode::OK;

    /** @var array<string, string> */
    private array $headers = [RequestHeader::CONTENT_TYPE => MediaType::APPLICATION_HAL];

    /** @var array<string, int|string> */
    private array $content = [];

    public function withStatusCode(int $code): HalJsonResponseInterface
    {
        $clone = clone $this;
        $clone->code = $code;

        return $clone;
    }

    public function withHeaders(array $headers): HalJsonResponseInterface
    {
        $clone = clone $this;
        $clone->headers = $headers;

        return $clone;
    }

    public function withContent(array $content): HalJsonResponseInterface
    {
        $clone = clone $this;
        $clone->content = $content;

        return $clone;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getContent(): array
    {
        return $this->content;
    }
}
