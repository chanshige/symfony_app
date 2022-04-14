<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\Extend;

use ReflectionMethod;
use Traversable;

class AttributeReader
{
    /**
     * @return Traversable
     */
    public function getMethodAttributes(ReflectionMethod $method, ?string $name = null): Traversable
    {
        foreach ($method->getAttributes($name) as $ref) {
            yield $ref->newInstance();
        }
    }
}
