<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\Annotation;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class Link
{
    public function __construct(
        public string $rel = '',
        public string $href = '',
    ) {
    }
}
