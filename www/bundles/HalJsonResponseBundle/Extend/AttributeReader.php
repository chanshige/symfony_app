<?php

declare(strict_types=1);

namespace Chanshige\HalJsonResponseBundle\Extend;

use ReflectionMethod;

class AttributeReader
{
    /**
     * @return array<int, object>
     */
    public function getMethodAttributes(ReflectionMethod $method): array
    {
        $attributes = [];
        foreach ($method->getAttributes() as $ref) {
            $attributes[] = $ref->newInstance();
        }

        return $attributes;
    }
}
