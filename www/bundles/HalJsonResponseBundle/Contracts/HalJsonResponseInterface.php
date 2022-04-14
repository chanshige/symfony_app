<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\Contracts;

interface HalJsonResponseInterface
{
    public function getCode(): int;

    public function getHeaders(): array;

    public function getContent(): array;

    public function withStatusCode(int $code): self;

    /**
     * @param array<string, mixed> $headers
     */
    public function withHeaders(array $headers): self;

    /**
     * @param array<string, mixed> $content
     */
    public function withContent(array $content): self;
}
