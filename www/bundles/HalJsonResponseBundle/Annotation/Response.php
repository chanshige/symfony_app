<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\Annotation;

use Attribute;
use Koriym\HttpConstants\StatusCode;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
final class Response
{
    public function __construct(
        public int $statusCode = StatusCode::OK,
        public array $headers = []
    ) {
    }
}
